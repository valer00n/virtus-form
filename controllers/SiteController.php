<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactRequest;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        // return $this->render('index');
        return $this->redirect('contact');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactRequest();

        if ($model->load(Yii::$app->request->post())) {

            $model->email = $model->email ? $model->email : Yii::$app->params['adminEmail'];

            $model->name = $model->name ? $model->name : 'Форма заказа';

            $model->duedate = Yii::$app->formatter->asDatetime($_POST['ContactRequest']['duedate'], 'Y-M-d H:i:s');
            if ($_POST['ContactRequest']['sizes']){
                $model->sizes = join('; ', $_POST['ContactRequest']['sizes']);
                $model->sizes .= '; '. $_POST['ContactRequest']['sizesmore'];
            }

            if($model->save()){

                $model->attachments = UploadedFile::getInstances($model, 'attachments');
                if ($model->upload()) {

                }

                $subject = 'Новый заказ от ' . $model->name . '<' . $model->email . '>';
                $body = 'Поступила новый заказ от ' . $model->name . '<' . $model->email . '>';

                $body .= ''. $model->initiator . "\n";
                $body .= ''. $model->task_type . "\n";
                $body .= ''. $model->description . "\n";
                $body .= ''. $model->slogan . "\n";

                $body .= ''. $model->sizes . "\n";
                $body .= ''. $model->duedate . "\n";
                $body .= ''. $model->proofs . "\n";
                $body .= 'Смотреть по ссылке '. Url::to(['requests/view', 'id' => $model->id], true);

            $ses = Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([$model->email => $model->name])
                ->setSubject($subject)
                ->setTextBody($body)
                ->send();

                if(!$ses){
                    Yii::$app->session->setFlash('error', 'There was an error sending email.');
                }

                //create attachments

                Yii::$app->session->setFlash('contactFormSubmitted');
                return $this->refresh();   
            }

        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
