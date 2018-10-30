<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguFrontlineServiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-frontline-service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'FrontlineServiceId') ?>

    <?= $form->field($model, 'OnPremise') ?>

    <?= $form->field($model, 'Online') ?>

    <?php // echo $form->field($model, 'ePayment') ?>

    <?php // echo $form->field($model, 'OnlineUrl') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
