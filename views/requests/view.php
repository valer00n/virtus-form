<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContactRequest */

$this->title = $model->id . '. ' . $model->initiator . ' / ' . $model->task_type . ' / ' . $model->slogan;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-request-view">

    <h1><?= Html::encode($this->title) ?></h1>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
            // 'id',
            'initiator',
            'email',
            'name',
            'task_type',
            'description:ntext',
            'slogan:ntext',
            'sizes:ntext',
            'duedate',
            'proofs:ntext',
            'priority',
            ],
            ]) ?>

            <div class="">
                <h3>Вложения:</h3>
                <?php foreach ($attaches as $attache): ?>
                   <div class="file-preview">
                    <div class="file-preview-thumbnails">
                        <div class="file-preview-frame" data-fileindex="0">
                             <div class="file-thumbnail-header">
                                <div class="file-caption-name" title="jpkk6f www.imagesplitter.net-0-5.png"><?= $attache->filename; ?></div>
                            </div>
                            <img src="/uploads/<?= $attache->filename; ?>" style="width:auto;height:160px;">
                        </div>
                    <a href='/uploads/<?= $attache->filename; ?>' target="_BLANK" type="button" class="btn btn-primary">Открыть в новом окне</a>
                    <a type="button" class="btn btn-success">Сохранить</a>
                </div>       
            </div>  
            <hr> 
            
        <?php endforeach; ?>
    </div>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>
        </p>    

</div>
