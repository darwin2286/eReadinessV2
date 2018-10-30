<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguComputingDeviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-computing-device-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'DesctopComputer') ?>

    <?= $form->field($model, 'Laptop') ?>

    <?= $form->field($model, 'ApplicationServer') ?>

    <?php // echo $form->field($model, 'WebServer') ?>

    <?php // echo $form->field($model, 'DBServer') ?>

    <?php // echo $form->field($model, 'FileServer') ?>

    <?php // echo $form->field($model, 'MailServer') ?>

    <?php // echo $form->field($model, 'Tablets') ?>

    <?php // echo $form->field($model, 'SmartPhones') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
