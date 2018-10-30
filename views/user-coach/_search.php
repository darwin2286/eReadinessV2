<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserCoachSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-coach-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Username') ?>

    <?= $form->field($model, 'AuthKey') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'PasswordResetToken') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'LguProfileId') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <?php // echo $form->field($model, 'IsDeleted') ?>

    <?php // echo $form->field($model, 'UserType') ?>

    <?php // echo $form->field($model, 'isLogin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
