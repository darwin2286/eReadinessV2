<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguOsAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-os-admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'OSWorkstation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OSServer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CBMS')->textInput() ?>

    <?= $form->field($model, 'HRMIS')->textInput() ?>

    <?= $form->field($model, 'LGPMS')->textInput() ?>

    <?= $form->field($model, 'PayrollSystem')->textInput() ?>

    <?= $form->field($model, 'PIS')->textInput() ?>

    <?= $form->field($model, 'ProcurementSystem')->textInput() ?>

    <?= $form->field($model, 'ProjectMonitoringSystem')->textInput() ?>

    <?= $form->field($model, 'RecordsManagementSystem')->textInput() ?>

    <?= $form->field($model, 'DocumentTrackingSystem')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
