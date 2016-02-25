<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--         <?= Html::a('Create Contact Request', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'initiator',
            'task_type',
            'description:ntext',
            'slogan:ntext',
            'sizes:ntext',
            'duedate',
            'proofs:ntext',
            // 'priority',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
