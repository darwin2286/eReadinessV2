<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cluster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cluster-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ClusterCode')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ClusterName')->textInput(['maxlength' => true]) ?>
   

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/index.php/library/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
