<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Psgcmunicipalitycity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psgcmunicipalitycity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProvinceId')->textInput() ?>

    <?= $form->field($model, 'PsgCodeMunicipalityCity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MunicipalityCityName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Level')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
