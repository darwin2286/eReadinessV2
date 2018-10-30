<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguCloud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-cloud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'Provider1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContractValidity1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider1Service6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContractValidity2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provider2Service6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WebHost1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WebHost2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Uuid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
