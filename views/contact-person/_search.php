<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactPersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'ConatactName') ?>

    <?= $form->field($model, 'ContactEmail') ?>

    <?= $form->field($model, 'ContactDesignation') ?>

    <?php // echo $form->field($model, 'ContactNo') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <?php // echo $form->field($model, 'PartNo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
