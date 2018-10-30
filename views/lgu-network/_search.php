<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguNetworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-network-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'Intranet') ?>

    <?= $form->field($model, 'LAN') ?>

    <?= $form->field($model, 'WAN') ?>

    <?php // echo $form->field($model, 'VPN') ?>

    <?php // echo $form->field($model, 'Intrenet') ?>

    <?php // echo $form->field($model, 'LeasedLine') ?>

    <?php // echo $form->field($model, 'DSL') ?>

    <?php // echo $form->field($model, 'MobileData') ?>

    <?php // echo $form->field($model, 'ISDN') ?>

    <?php // echo $form->field($model, 'Satellite') ?>

    <?php // echo $form->field($model, 'ISP') ?>

    <?php // echo $form->field($model, 'ISPProvider1') ?>

    <?php // echo $form->field($model, 'Bandwidth1') ?>

    <?php // echo $form->field($model, 'ISPProvider2') ?>

    <?php // echo $form->field($model, 'Bandwidth2') ?>

    <?php // echo $form->field($model, 'NoEmployeeInternet') ?>

    <?php // echo $form->field($model, 'NoEmployeeEmail') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
