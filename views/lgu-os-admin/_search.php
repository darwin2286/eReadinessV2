<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguOsAdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-os-admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'OSWorkstation') ?>

    <?= $form->field($model, 'OSServer') ?>

    <?= $form->field($model, 'CBMS') ?>

    <?php // echo $form->field($model, 'HRMIS') ?>

    <?php // echo $form->field($model, 'LGPMS') ?>

    <?php // echo $form->field($model, 'PayrollSystem') ?>

    <?php // echo $form->field($model, 'PIS') ?>

    <?php // echo $form->field($model, 'ProcurementSystem') ?>

    <?php // echo $form->field($model, 'ProjectMonitoringSystem') ?>

    <?php // echo $form->field($model, 'RecordsManagementSystem') ?>

    <?php // echo $form->field($model, 'DocumentTrackingSystem') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
