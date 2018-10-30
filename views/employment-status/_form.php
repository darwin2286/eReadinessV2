<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmploymentStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employment-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EmploymentStatusDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/library/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
