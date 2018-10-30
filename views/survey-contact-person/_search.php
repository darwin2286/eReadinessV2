<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyContactPersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-contact-person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'full_name') ?>

    <?= $form->field($model, 'agency') ?>

    <?= $form->field($model, 'email_address') ?>

    <?= $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
