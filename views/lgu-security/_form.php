<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguSecurity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-security-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'ProtectionScheme')->textInput() ?>

    <?= $form->field($model, 'SecurityPolicy')->textInput() ?>

    <?= $form->field($model, 'DisasterRecoveryPlan')->textInput() ?>

    <?= $form->field($model, 'DigitalSecurity')->textInput() ?>

    <?= $form->field($model, 'Encryption')->textInput() ?>

    <?= $form->field($model, 'UPS')->textInput() ?>

    <?= $form->field($model, 'HardwareFirewall')->textInput() ?>

    <?= $form->field($model, 'SoftwareFirewall')->textInput() ?>

    <?= $form->field($model, 'SubSecuritySoft')->textInput() ?>

    <?= $form->field($model, 'EmailAuth')->textInput() ?>

    <?= $form->field($model, 'OffsiteBackup')->textInput() ?>

    <?= $form->field($model, 'SecuredServer')->textInput() ?>

    <?= $form->field($model, 'Storagebackup')->textInput() ?>

    <?= $form->field($model, 'ISSP')->textInput() ?>

    <?= $form->field($model, 'ISSPDesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
