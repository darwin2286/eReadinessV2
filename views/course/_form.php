<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Course;
/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CourseDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subtopic')->dropDownList(['1'=>'Yes','0'=>'No'],['prompt'=>'--If Subtopic--']) ?>
    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>
    <?= $form->field($model, 'ParentId')->dropDownList(ArrayHelper::map(Course::find()->all(), 'Id', 'CourseDescription'),['prompt'=>'--Select Parent Course--']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/library/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
