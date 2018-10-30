<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'MunicipalityCityId') ?>

    <?= $form->field($model, 'IncomeClassId') ?>

    <?= $form->field($model, 'lgu_website') ?>

    <?= $form->field($model, 'new_business_corporation') ?>

    <?php // echo $form->field($model, 'new_business_cooperative') ?>

    <?php // echo $form->field($model, 'new_business_partnership') ?>

    <?php // echo $form->field($model, 'new_business_signle') ?>

    <?php // echo $form->field($model, 'renew_business_corporation') ?>

    <?php // echo $form->field($model, 'renew_business_cooperative') ?>

    <?php // echo $form->field($model, 'renew_business_partnership') ?>

    <?php // echo $form->field($model, 'renew_business_single') ?>

    <?php // echo $form->field($model, 'lce_name') ?>

    <?php // echo $form->field($model, 'LceTermId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
