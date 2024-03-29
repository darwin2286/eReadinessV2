<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguNetwork */

$this->title = 'Update Lgu Network: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-network-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
