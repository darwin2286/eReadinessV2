<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeePositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-position-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'EmployeePositionId') ?>

    <?= $form->field($model, 'EmployeeStatusId') ?>

    <?= $form->field($model, 'NoOfEmployee') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
