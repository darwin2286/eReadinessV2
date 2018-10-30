<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguHardwarePeripherals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-hardware-peripherals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'MultiPrinter')->textInput() ?>

    <?= $form->field($model, 'Printer')->textInput() ?>

    <?= $form->field($model, 'DocScanner')->textInput() ?>

    <?= $form->field($model, 'UPS')->textInput() ?>

    <?= $form->field($model, 'GenSet')->textInput() ?>

    <?= $form->field($model, 'Biometric')->textInput() ?>

    <?= $form->field($model, 'AccessCard')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
