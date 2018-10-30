<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coaches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coaches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CoachesName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClusterId')->dropDownList($item,['prompt'=>'--Select Cluster--']) ?>

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
