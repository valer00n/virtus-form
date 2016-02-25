<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use dosamigos\datetimepicker\DateTimePicker;

$this->title = 'Универсальная форма';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div style="text-align: center;">
        <img src="/assets/logo400x100.png">
    </div>
    <h1>Универсальная форма</h1>
    <p>Пожалуйста, внимательно заполняйте поля. Вне этой формы задания будут ставиться сначала в хвост очереди, а в дальнейшем: игнорироваться.</p>
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



                <?php
                $items = array("Обложка передачи (1920х1080)" => "Обложка передачи (1920х1080)",
                "VP: Обложка (890х300)" => "VP: Обложка (890х300)",
                "VP: Обложка для ВК (550х300)" => "VP: Обложка для ВК (550х300)",
                "VP: Фара (370x165)" => "VP: Фара (370x165)",
                "VP: Фара c текстом (321х321)" => "VP: Фара c текстом (321х321)",
                "VP: Фара без текста (280х280)" => "VP: Фара без текста (280х280)",
                "FS: Обложка (1920х577)" => "FS: Обложка (1920х577)",
                "FS: Баннер сверху блока (315x144)" => "FS: Баннер сверху блока (315x144)",
                "FS: Баннер справа от блока (483x262)" => "FS: Баннер справа от блока (483x262)",
                "FS: Изображение товара (800x800)" => "FS: Изображение товара (800x800)",
                "ДРУГОЕ (размер вписать ниже)" => "ДРУГОЕ (размер вписать ниже)");

                    echo $form->field($model, 'sizes')->checkboxList($items, $params);
                ?>
                <?= $form->field($model, 'sizesmore')->textInput() ?>

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

                    <?= $form->field($model, 'attachments[]')->widget(\dosamigos\fileinput\BootstrapFileInput::className(), [
                        'options' => ['accept' => 'image/*', 'multiple' => true],
                        'clientOptions' => [
                            'previewFileType' => 'text',
                            'browseClass' => 'btn btn-success',
                            'uploadClass' => 'btn btn-info',
                            'removeClass' => 'btn btn-danger',
                            'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
                        ]
                    ]);?>

                    <div class="form-group">
                        <?= Html::submitButton('Готово', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    <?php endif; ?>
    <div style="text-align: center;">
        <img src="/assets/virtus_142x149_20_1_.png">
    </div>    
</div>
