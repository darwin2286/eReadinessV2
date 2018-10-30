<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lgu-employee-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'LguProfileId') ?>

    <?= $form->field($model, 'CourseId') ?>

    <?= $form->field($model, 'NoOfEmployee') ?>

    <?= $form->field($model, 'OtherProgramming') ?>

    <?php // echo $form->field($model, 'OtherNoSql') ?>

    <?php // echo $form->field($model, 'OtherDatabase') ?>

    <?php // echo $form->field($model, 'Uuid') ?>

    <?php // echo $form->field($model, 'checkSubCourse') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
