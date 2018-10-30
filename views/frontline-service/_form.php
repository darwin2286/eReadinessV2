<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\FrontlineService;
/* @var $this yii\web\View */
/* @var $model app\models\FrontlineService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontline-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'InActive'],['prompt'=>'--Select Status--']) ?>
    <?= $form->field($model, 'ParentId')->dropDownList(ArrayHelper::map(FrontlineService::find()->all(), 'Id', 'Description'),['prompt'=>'--Select Parent Frontline Service--']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/library/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
