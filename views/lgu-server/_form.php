<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguServer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-server-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'CapicityStorage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'InHouse')->textInput() ?>

    <?= $form->field($model, 'CoLocated')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
