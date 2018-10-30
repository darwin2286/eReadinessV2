<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SoftwareOs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="software-os-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OSDescription')->textInput() ?>

    <?= $form->field($model, 'WorkstationServer')->dropDownList(['1'=>'Workstation','2'=>'Server'],['prompt'=>'--Select Device--']) ?>

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/library/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
