<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LguProfileId')->textInput() ?>

    <?= $form->field($model, 'CourseId')->textInput() ?>

    <?= $form->field($model, 'NoOfEmployee')->textInput() ?>

    <?= $form->field($model, 'OtherProgramming')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OtherNoSql')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OtherDatabase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkSubCourse')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
