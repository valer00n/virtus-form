<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
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
            // ['class' => 'yii\grid\SerialColumn'],
            // ['class' => 'app\commands\StatusColumn'],
            'id',        
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {                      
                    switch ($model->status) {
                        case 1:
                            return "<div style='background-color: red; min-width: 32px; min-height: 32px;'></div>";
                            break;
                        case 2:
                            return "<div style='background-color: yellow; min-width: 32px; min-height: 32px;'></div>";
                            break;
                        case 3:
                            return "<div style='background-color: green; min-width: 32px; min-height: 32px;'></div>";
                            break;
                        
                        default:
                            return "<div style='background-color: #fff;'></div>";
                            break;
                    }
                },
            ],        
            'initiator',
            'email',
            'name', 
            'task_type',
            // 'description:ntext',
            'slogan:ntext',
            'sizes:ntext',
            'duedate',
            // 'proofs:ntext',
            // 'priority',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
