<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeePosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'EmployeePositionId')->textInput() ?>

    <?= $form->field($model, 'EmployeeStatusId')->textInput() ?>

    <?= $form->field($model, 'NoOfEmployee')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
