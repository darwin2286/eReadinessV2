<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'eReadiness Survey';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->registerCssFile("@web/css/login.css"); ?>


<div class="container-fluid" hidden>
    <div class="card bg-white">
        <div class="card__images bg-dark">
            <div class="row">
                <div class="col-md-12">
                    <!-- eReadiness Survey Logo !-->
                    <img src="<?=Url::to('@web/img/eReadinessSurveyLogo.png');?>" style="width:100%; height:100%;" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>
                </div>
            </div>
        </div>
        <div class="card__body">
            <!-- LOGIN FORM !--> 
            <?php $form = ActiveForm::begin([
                'class' => '',
                'fieldConfig' => [
                    //'template' => "{label}\n<div class=\"input100\">{input}<span class=\"focus-input100\"></span></div>\n<div class=\"col-lg-12\">{error}</div>",
                   // 'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ], 
            ]);
            ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'username')->passwordInput(['class'=>'form-control', 'placeholder' => 'Access Token'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-info login__button pull-right', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>  
        </div>

        <div class="card__footer" >
            <div class="agency_logos">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?=Url::to('@web/img/DICTlogo.png');?>" style="width:100%; height:auto; padding-left:20px;" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>
                    </div>
                    <div class="col-md-6">
                        <img src="<?=Url::to('@web/img/dilg_logo.png');?>" style="width:130px; height:130px; padding-top:10px; padding-left:20px;" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>


<div class="limiter">
    <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
    'labelOptions' => ['class' => 'col-lg-2 control-label'],
      ], 
     ]); ?> 
	<div class="wrap-login100">
                <?= Html::img('@web/img/eReadiness2018.png', ['alt'=>'some', 'class'=>'logimgsize']);?>
                <?= Html::img('@web/img/DICTlogo.png', ['alt'=>'some', 'class'=>'logimgsize2']);?>
        <br/>
        <div class="logform">
            <div class="col-md-12">
            <h1 class="white">eReadiness Survey</h1>  

            <?php $form = ActiveForm::begin([
                    'class' => '',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"input100\">{input}<span class=\"focus-input100\"></span></div>\n<div class=\"col-lg-12\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ], 
            ]);

            ?> 
                 <div class="col-md-12">
                    <div class="col-md-9">

                                <?= $form->field($model, 'username')->passwordInput(['class'=> 'inputpwd glyphicon glyphicon-lock', 'placeholder'=>'Access Token'])->label(false)?>
                    </div>
                    <div class="col-md-3">
                        
                    <?= Html::submitButton('Login', ['class' => 'login100-form-btn', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
                
        <?php ActiveForm::end(); ?>  
    </div>

</div>






