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
        'label' => '[***]',
        'format' => 'raw',
        'value' => function ($model) {                      
            switch ($model->status) {
                case 1:
                return "<div style='background-color: red; width: 32px; min-width: 32px; min-height: 32px;'></div>";
                break;
                case 2:
                return "<div style='background-color: yellow; width: 32px; min-width: 32px; min-height: 32px;'></div>";
                break;
                case 3:
                return "<div style='background-color: green; width: 32px; min-width: 32px; min-height: 32px;'></div>";
                break;

                default:
                return "<div style='background-color: #fff;'></div>";
                break;
            }
        },
        ],        
        'initiator',
        'email',
            // 'name', 
        'task_type',
            // 'description:ntext',
        'slogan:ntext',
            // 'sizes:ntext',
        'duedate',
        [
        'attribute' => 'comment',
        'label' => 'Пометка',
        'format' => 'raw',
        'value' => function ($model) {                      
            return "<a href='#' data-id='". $model->id ."' class='comment-link' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-tags'></span></a><br>". $model->comment;
        },
        ],                
            // 'proofs:ntext',
            // 'priority',

        ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>

    </div>
    <script>

    </script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="/requests/comment" method="POST">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавить коментарий</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="request-id-input" name="id" value="">

                <div class="form-group">
                    <label for="exampleInputFile">Серёжа, введи сюда свой комментарий :)</label>
                    <textarea  class="form-control" name="comment" id="request-comment-textarea" cols="30" rows="10"></textarea>
                    <p class="help-block"></p>
                </div>            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
