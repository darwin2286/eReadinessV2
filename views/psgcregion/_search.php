<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PsgcregionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psgcregion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'PsgCodeRegion') ?>

    <?= $form->field($model, 'RegionCode') ?>

    <?= $form->field($model, 'RegionName') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
