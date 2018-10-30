<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeOffice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-office-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'ICTOffice')->textInput() ?>

    <?= $form->field($model, 'BPLOffice')->textInput() ?>

    <?= $form->field($model, 'TreasurtOffice')->textInput() ?>

    <?= $form->field($model, 'OBOffice')->textInput() ?>

    <?= $form->field($model, 'HealthOffice')->textInput() ?>

    <?= $form->field($model, 'PDOffice')->textInput() ?>

    <?= $form->field($model, 'ZonningOffice')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
