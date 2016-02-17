<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use dosamigos\datetimepicker\DateTimePicker;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо за заказ.
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">
            <!-- 
                public $initiator;
                public $task_type;
                public $description;
                public $slogan;
                public $sizes;
                public $duedate;
                public $proofs; 
            -->
                <?php $form = ActiveForm::begin([
                        'id' => 'ContactRequest',
                        'options' => ['enctype'=>'multipart/form-data']
                    ]); ?>

                <?php
                    $items = [
                        'Маркетинг' => 'Маркетинг',
                        'Промо' => 'Промо',
                        'Видеостудия' => 'Видеостудия',
                        'Сайт Virtus.pro' => 'Сайт Virtus.pro',
                        'Сайт Fragstone' => 'Сайт Fragstone'

                    ];
                    $params = [
                        'prompt' => 'Выберите...'
                    ];
                    echo $form->field($model, 'initiator')->dropDownList($items, $params);
                ?>    

                <?php
                    $items = [
                        'Реклама' => 'Реклама',
                        'Презентация' => 'Презентация',
                        'Пиар' => 'Пиар',
                        'Акция' => 'Акция',
                        'Конкурс' => 'Конкурс',
                        'Новость' => 'Новость',
                        'Передача' => 'Передача',
                        'ДРУГОЕ' => 'ДРУГОЕ',
                    ];
                    $params = [
                        'prompt' => 'Выберите...'
                    ];
                    echo $form->field($model, 'task_type')->dropDownList($items, $params);
                ?>    

                    <?= DateTimePicker::widget([
                        'model' => $model,
                        'attribute' => 'duedate',
                        'language' => 'ru',
                        'size' => 'ms',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy HH:ii',
                            'todayBtn' => true
                        ]
                    ]);?>              

                    <?= $form->field($model, 'description')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'slogan')->textInput() ?>

                    <?= $form->field($model, 'proofs')->textArea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Готово', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
