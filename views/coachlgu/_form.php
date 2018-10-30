<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Coaches;
use app\models\Psgcprovince;
use app\models\Psgcmunicipalitycity;
use kartik\depdrop\DepDrop;


/* @var $this yii\web\View */
/* @var $model app\models\Coachlgu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coachlgu-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->errorSummary($model) ?> -->
    
     <?= $form->field($model, 'CoachId')->dropDownList(
        ArrayHelper::map(Coaches::find()->all(),'Id','CoachesName'),
        ['prompt'=> 'Select Coach']
    ) ?>

     <!-- <?= $form->field($model, 'ProvinceId')->dropDownList(
        ArrayHelper::map(Psgcprovince::find()->all(),'Id','ProvinceName'),
        [
            'prompt'=> 'Select Province',
            'onchange'=>'
            $.post( "/psgcprovince/lists?id='.'"+$(this).val(), function(data)  {
                    $("select$models-contact").html(data) ;
            });'
            
          ]); ?>

           <?= $form->field($model, 'PsgcMunicipalityCityId')->dropDownList(
        ArrayHelper::map(Psgcmunicipalitycity::find()->all(),'Id','MunicipalityCityName'),
        [
            'prompt'=> 'Select Municipality',
            ]); ?> -->




     <?= $form->field($model, 'ProvinceId')->dropDownList(ArrayHelper::map(Psgcprovince::find()->all(),'Id','ProvinceName'), ['id'=>'coachlgu-provinceid']); ?>


     <?= $form->field($model, 'PsgcMunicipalityCityId')->widget(DepDrop::classname(), [
            'options'=>['id'=>'coachlgu-psgcmunicipalitycityid'],
            'pluginOptions'=>[
                'depends'=>['coachlgu-provinceid'],
                'placeholder'=>'Select...',
                'url'=>Url::to(['/coachlgu/subcat'])
            ]
        ]); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
