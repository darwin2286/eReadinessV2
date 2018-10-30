<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguSecuritySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-security-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'ProtectionScheme') ?>

    <?= $form->field($model, 'SecurityPolicy') ?>

    <?= $form->field($model, 'DisasterRecoveryPlan') ?>

    <?php // echo $form->field($model, 'DigitalSecurity') ?>

    <?php // echo $form->field($model, 'Encryption') ?>

    <?php // echo $form->field($model, 'UPS') ?>

    <?php // echo $form->field($model, 'HardwareFirewall') ?>

    <?php // echo $form->field($model, 'SoftwareFirewall') ?>

    <?php // echo $form->field($model, 'SubSecuritySoft') ?>

    <?php // echo $form->field($model, 'EmailAuth') ?>

    <?php // echo $form->field($model, 'OffsiteBackup') ?>

    <?php // echo $form->field($model, 'SecuredServer') ?>

    <?php // echo $form->field($model, 'Storagebackup') ?>

    <?php // echo $form->field($model, 'ISSP') ?>

    <?php // echo $form->field($model, 'ISSPDesc') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
