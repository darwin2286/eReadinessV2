<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Psgcregion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psgcregion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PsgCodeRegion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RegionCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RegionName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
