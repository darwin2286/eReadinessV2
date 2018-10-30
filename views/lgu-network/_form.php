<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguNetwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-network-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'Intranet')->textInput() ?>

    <?= $form->field($model, 'LAN')->textInput() ?>

    <?= $form->field($model, 'WAN')->textInput() ?>

    <?= $form->field($model, 'VPN')->textInput() ?>

    <?= $form->field($model, 'Intrenet')->textInput() ?>

    <?= $form->field($model, 'LeasedLine')->textInput() ?>

    <?= $form->field($model, 'DSL')->textInput() ?>

    <?= $form->field($model, 'MobileData')->textInput() ?>

    <?= $form->field($model, 'ISDN')->textInput() ?>

    <?= $form->field($model, 'Satellite')->textInput() ?>

    <?= $form->field($model, 'ISP')->textInput() ?>

    <?= $form->field($model, 'ISPProvider1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Bandwidth1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ISPProvider2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Bandwidth2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoEmployeeInternet')->textInput() ?>

    <?= $form->field($model, 'NoEmployeeEmail')->textInput() ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
