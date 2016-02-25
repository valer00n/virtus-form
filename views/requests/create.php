<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContactRequest */

$this->title = 'Create Contact Request';
$this->params['breadcrumbs'][] = ['label' => 'Contact Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
