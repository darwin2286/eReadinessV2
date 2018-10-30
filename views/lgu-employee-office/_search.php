<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeOfficeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-office-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'ICTOffice') ?>

    <?= $form->field($model, 'BPLOffice') ?>

    <?= $form->field($model, 'TreasurtOffice') ?>

    <?php // echo $form->field($model, 'OBOffice') ?>

    <?php // echo $form->field($model, 'HealthOffice') ?>

    <?php // echo $form->field($model, 'PDOffice') ?>

    <?php // echo $form->field($model, 'ZonningOffice') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
