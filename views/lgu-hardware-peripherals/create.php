<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguHardwarePeripherals */

$this->title = 'Create Lgu Hardware Peripherals';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Hardware Peripherals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-hardware-peripherals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
