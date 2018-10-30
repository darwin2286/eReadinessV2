<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguOsOther */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-os-other-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguOSAdminId')->textInput() ?>

    <?= $form->field($model, 'OtherName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
