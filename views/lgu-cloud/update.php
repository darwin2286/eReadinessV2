<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguCloud */

$this->title = 'Update Lgu Cloud: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Clouds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-cloud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
