<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LguHardwarePeripherals */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Hardware Peripherals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-hardware-peripherals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
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
            'Id',
            'LguProfileId',
            'MultiPrinter',
            'Printer',
            'DocScanner',
            'UPS',
            'GenSet',
            'Biometric',
            'AccessCard',
            'Uuid',
        ],
    ]) ?>

</div>
