<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguHardwarePeripheralsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-hardware-peripherals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'MultiPrinter') ?>

    <?= $form->field($model, 'Printer') ?>

    <?= $form->field($model, 'DocScanner') ?>

    <?php // echo $form->field($model, 'UPS') ?>

    <?php // echo $form->field($model, 'GenSet') ?>

    <?php // echo $form->field($model, 'Biometric') ?>

    <?php // echo $form->field($model, 'AccessCard') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
