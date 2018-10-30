<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguHardwarePeripherals */

$this->title = 'Update Lgu Hardware Peripherals: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Hardware Peripherals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-hardware-peripherals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
