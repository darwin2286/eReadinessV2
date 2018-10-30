<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Psgcprovince */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psgcprovince-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RegionId')->textInput() ?>

    <?= $form->field($model, 'PsgCodeProvince')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProvinceName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
