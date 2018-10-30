<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguFrontlineServiceOther */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-frontline-service-other-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'OtherName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OnPremise')->textInput() ?>

    <?= $form->field($model, 'Online')->textInput() ?>

    <?= $form->field($model, 'ePayment')->textInput() ?>

    <?= $form->field($model, 'OnlineUrl')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
