<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguComputingDevice */

$this->title = 'Update Lgu Computing Device: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Computing Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-computing-device-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
