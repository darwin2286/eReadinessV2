<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactPerson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'ConatactName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContactEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContactDesignation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContactNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PartNo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
