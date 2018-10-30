<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EmployementStatusId')->textInput() ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'EmployeeMale')->textInput() ?>

    <?= $form->field($model, 'EmployeeFemale')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
