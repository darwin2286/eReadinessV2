<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'EmployementStatusId') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'EmployeeMale') ?>

    <?= $form->field($model, 'EmployeeFemale') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
