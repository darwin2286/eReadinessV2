<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\YiiAsset;
use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .text-white {
        color:#fff !important;
    }
    .panel, .panel-heading{
        border-radius: 0 !important;
    }
    .no-top-bottom-margin{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
    div#contact-panel.panel.panel-heading{
        padding:18px 15px;
    }
</style>

<div class="container-fluid">
    <div class="panel panel-primary no-border" id="contact-panel" style="margin-top:15px;">
        <div class="panel-heading">
            <h3 class="no-top-bottom-margin text-white"> Contact Information </h3>
        </div>
        <div class="panel-body">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="<?php echo Url::to('@web/img/dict_logo.png') ?>" alt="DICT" height="210px" width="200px">
                </a>
            </div>
            <div class="media-body">
                <h2 class="media-heading" style="margin-top:15px;">Noriel Darwin Abuel</h2>
                
            </div>
            </div>
        </div>
    </div>
</div>









<div class="site-contact" hidden>
    <h2>Contact</h2>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>
   
        <p>
           If you have other inquiries or questions, please contact:
            <br/>    
            <br/>
            <div style="font-size: 20px;">
            <h3>DICT Contact Person:</h3>
            <label>Noriel Darwin Abuel </label>
            <br/>
          
            <i class="fas fa-at fa-x2"></i> darwin.abuel@dict.gov.ph <br/>
            <i class="fas fa-phone fa-x2"></i> 920-74-11<br/>
            <br/>
           
            </div>
        </p>    

        <!-- <div class="row">
       
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div> -->

    <?php endif; ?>
</div>
