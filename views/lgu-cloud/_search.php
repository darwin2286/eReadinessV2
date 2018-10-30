<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguCloudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-cloud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'Provider1') ?>

    <?= $form->field($model, 'ContractValidity1') ?>

    <?= $form->field($model, 'Provider1Service1') ?>

    <?php // echo $form->field($model, 'Provider1Service2') ?>

    <?php // echo $form->field($model, 'Provider1Service3') ?>

    <?php // echo $form->field($model, 'Provider1Service4') ?>

    <?php // echo $form->field($model, 'Provider1Service5') ?>

    <?php // echo $form->field($model, 'Provider1Service6') ?>

    <?php // echo $form->field($model, 'Provider2') ?>

    <?php // echo $form->field($model, 'ContractValidity2') ?>

    <?php // echo $form->field($model, 'Provider2Service1') ?>

    <?php // echo $form->field($model, 'Provider2Service2') ?>

    <?php // echo $form->field($model, 'Provider2Service3') ?>

    <?php // echo $form->field($model, 'Provider2Service4') ?>

    <?php // echo $form->field($model, 'Provider2Service5') ?>

    <?php // echo $form->field($model, 'Provider2Service6') ?>

    <?php // echo $form->field($model, 'WebHost1') ?>

    <?php // echo $form->field($model, 'WebHost2') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
