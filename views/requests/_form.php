<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactRequest */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="contact-request-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?php
            $items = [
                '1' => 'Красный',
                '2' => 'Желтый',
                '3' => 'Зелёный',
            ];
            $params = [
                'prompt' => 'Не выбран'
            ];
            echo $form->field($model, 'status')->dropDownList($items, $params);
        ?>    

        <?= $form->field($model, 'initiator')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'task_type')->textInput(['maxlength' => true]) ?>

        
        
    </div>

    <div class="col-md-6">
        
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'duedate')->textInput() ?>

    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'sizes')->textarea(['rows' => 6]) ?>    

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        
    </div>

    <div class="col-md-6">


        <?= $form->field($model, 'slogan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'proofs')->textarea(['rows' => 6]) ?>
    </div>
</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
