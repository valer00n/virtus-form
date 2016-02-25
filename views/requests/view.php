<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContactRequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'initiator',
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
                   <img src="/uploads/<?= $attache->filename; ?>" style="width:auto;height:160px;">
                   <div class="file-thumbnail-footer">
                    <div class="file-caption-name" title="jpkk6f www.imagesplitter.net-0-5.png" style="width: 111px;"><?= $attache->filename; ?></div>
                    
                </div>
                </div>
                </div>       
             </div>   
            
        <?php endforeach; ?>
    </div>

</div>
