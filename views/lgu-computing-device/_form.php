<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguComputingDevice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-computing-device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'DesctopComputer')->textInput() ?>

    <?= $form->field($model, 'Laptop')->textInput() ?>

    <?= $form->field($model, 'ApplicationServer')->textInput() ?>

    <?= $form->field($model, 'WebServer')->textInput() ?>

    <?= $form->field($model, 'DBServer')->textInput() ?>

    <?= $form->field($model, 'FileServer')->textInput() ?>

    <?= $form->field($model, 'MailServer')->textInput() ?>

    <?= $form->field($model, 'Tablets')->textInput() ?>

    <?= $form->field($model, 'SmartPhones')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
