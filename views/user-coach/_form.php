<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Coaches;

/* @var $this yii\web\View */
/* @var $model app\models\UserCoach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-coach-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'CoachId')->dropDownList(
        ArrayHelper::map(Coaches::find()->all(),'Id','CoachesName'),
        ['prompt'=> 'Select Coach']
    ) ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

  

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

  

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>


     <?= $form->field($model, 'LguProfileId')->dropDownList(
        ArrayHelper::map(Psgcprovince::find()->all(),'Id','ProvinceName'),
        ['prompt'=> 'Select Province']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
