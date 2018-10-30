<?php
use app\models\Coaches;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use yii\bootstrap\Modal;
use app\models\LceTerm;
use yii\console\widgets\Table;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use yii\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $this->registerCssFile("@web/css/custom-style.css"); ?>
<?php $form = ActiveForm::begin([
   'id' => 'lgu-profile-form',
   'enableClientValidation' => false,
   'options' => [
    'validateOnSubmit' => true,
    'class' => 'form'
   ]
]); ?>
<?php
  $user=Yii::$app->user->identity->CoachId;
  $coach = Coaches::find()->where(['Id' => $user])->all();
  $province = Psgcprovince::findOne($municipalityCity->ProvinceId);
  $region = Psgcregion::findOne($province->RegionId);
  $incomeClass = IncomeClass::find()->all();
  $lceTerm = LceTerm::find()->all();
  if($model['isFinalized'] == 1)
  {
    echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/index.php/lgu-profile/mpdf-demo1', 'id' => $model->Id]), ['class' => 'btn btn-danger pull-right','target'=>'_blank', 'style' => 'margin-top:19px; margin-right:15px;']);
    $readOnlyFinalize = true;
  }else{
    $readOnlyFinalize = false;
  }
?>

<div class="container-fluid no-side-padding">
  <div class="panel panel-default">
    <div id="panel-heading-title" class="panel-heading" >
      <h2 class="header-no-margin">
        PART I A. LGU PROFILE
      </h2>
    </div>

    <div class="panel-body no-padding">
      <!-- PROFILE OF TH LGU !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading" hidden>
          <h3 class="header-no-margin" style="color:#fff;"> A. LGU PROFILE </h3>
        </div>
        <div class="panel-body">
        <div class="row">
          <div class="col-md-6">
            <table class="table table-striped lgu-profile">
              <tr>
                <td class="text-right">
                  <?= Html::label('LGU Name', 'muniCityName',['class'=>'control-label']) ?>
                </td>
                <td>
                  <?= Html::input('text', 'municipalityName', $municipalityCity->MunicipalityCityName, ['class' => 'form-control','readonly'=>true]) ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <?= Html::label('Province', 'province',['class'=>'control-label']) ?>
                </td>
                <td>
                  <?= Html::input('text', 'provinceName', $province->ProvinceName, ['class' => 'form-control','readonly'=>true]) ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                <?= Html::label('Region', 'region',['class'=>'control-label']) ?>
                </td>
                <td>
                  <?= Html::input('text', 'regionName', $region->RegionName, ['class' => 'form-control','readonly'=>true]) ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <?= Html::label('Level', 'level',['class'=>'control-label']) ?>
                </td>
                <td class="">
                    <?= $form->field($municipalityCity, 'Level')->radioList(['1'=>'City','0'=>'Municipality'])->label(false); ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <?= Html::label('Class', 'incomeClassLbl',['class'=>'control-label']) ?>
                </td>
                <td class="">
                    <?php
                      foreach($incomeClass as $ic)
                      {
                        $incomeClassList[$ic['Id']] = $ic['Name'];;
                      }
                      if($model['IncomeClassId'] == "8")
                      {
                        $readOnlyOtherClass = false;
                      }else{
                        $readOnlyOtherClass = true;
                      }
                      echo $form->field($model, 'IncomeClassId')->radioList($incomeClassList, ['seprator'=>''])->label(false);
                      echo $form->field($model, 'OtherClass')->textInput(['maxlength' => true,'readOnly'=>$readOnlyOtherClass])->label(false);
                    ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <?= Html::activeLabel($model, 'NoBarangay'); ?>
                </td>
                <td>
                  <?= $form->field($model, 'NoBarangay', ['options' => ['class' => 'profLbl', 'style'=>'width:365px;']])
                            ->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,'max'=>100])
                            ->label(false) ?>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <?= Html::activeLabel($model, 'lgu_website'); ?>
                </td>
                <td>
                  <?= $form->field($model, 'lgu_website', ['options' => ['class' => 'profLbl', 'style'=>'width:365px;']])
                  ->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])
                  ->label(false) ?>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <div class="text-center">
              <h4 class="header-no-margin"> TOTAL NUMBER OF REGISTERED BUSINESSES </h4>
              <h5 class="header-no-margin"> (As of September 2018) </h5>
            </div>
            <div class="panel panel-default" style="margin-top:8px;">
              <div class="panel-body" id="total-registered-businesses_section">
                <div class="types-of-new-application">
                  <div class="row" style="margin-bottom:8px;">
                    <div class="col-md-12 col-sm-6">
                      <h4 class="header-no-margin font-weight-bold"> NEW </h4>
                    </div>
                  </div>
                  <table class="table table-striped">
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'new_business_corporation'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'new_business_corporation', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'new_business_cooperative'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'new_business_cooperative', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'new_business_partnership'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'new_business_partnership', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>

                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'new_business_signle'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'new_business_signle', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <!-- SUB TOTAL FIELD !-->
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'totalNew'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'totalNew', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['id'=>'totalNew','class' => 'form-control','readonly'=>true, 'style'=>'border-color: #72bcd4'])->label(false) ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="types-of-renewed-application">
                  <div class="row" style="margin-bottom:8px;">
                    <div class="col-md-12 col-sm-6">
                      <h4 class="header-no-margin font-weight-bold"> RENEWED </h4>
                    </div>
                  </div>
                  <table class="table table-striped">
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'renew_business_corporation'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'renew_business_corporation', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'renew_business_cooperative'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'renew_business_cooperative', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'renew_business_partnership'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'renew_business_partnership', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>

                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'renew_business_single'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'renew_business_single', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['type' => 'number','readOnly'=>$readOnlyFinalize,'min'=>0,])->label(false) ?>
                      </td>
                    </tr>
                    <!-- SUB TOTAL FIELD !-->
                    <tr>
                      <td class="text-right">
                        <?= Html::activeLabel($model, 'totalRenew'); ?>
                      </td>
                      <td>
                        <?= $form->field($model, 'totalRenew', ['options' => ['class' => 'profLbl', 'style' => 'width:365px;']])->textInput(['id'=>'totalRenew','class' => 'form-control','readonly'=>true, 'style'=>'border-color: #72bcd4'])->label(false) ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="alert alert-default" id="grand-total-of-businesses" style="margin-bottom:0; padding:0px 15px;">
                  <table class="table">
                    <tr>
                      <td>
                        <label for="exampleInputEmail1">Grand Total (New and Renewed):</label>
                      </td>
                    </tr>
                    <tr class="">
                      <td>
                        <?= Html::input('text', 'grandTotal','', ['id'=>'grandTotal','class' => 'form-control','readonly'=>true, 'style'=>'border-color: #72bcd4; width:475px !important;']) ?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>

      <!--MAYOR'S INFORMATION !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            1. MAYOR/LOCAL CHIEF EXECUTIVE (LCE)
          </h4>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-striped">
            <tr>
              <td class="text-right" style="width:250px;">
                <div style="font-size:16px;">
                 <?= Html::label('Full Name', 'lce_name',['class'=>'control-label']) ?>
                </div>
              </td>
              <td colspan="3">
                <?= $form->field($model, 'lce_name')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize, 'style' => 'width:100% !important;'])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td class="text-right"> <?= Html::label('Term of Office', 'LceTermId',['class'=>'control-label']) ?> </td>

              <?php
              $lceList= [];
              foreach($lceTerm as $lce)
              {
                $lceList[$lce['Id']] = $lce['description'];
              }

              echo "<td>".$form->field($model, 'LceTermId')->radioList($lceList)->label(false)."</td>";
              ?>
            </tr>
          </table>
        </div>
      </div>

      <!--LOCAL REVENUE CODE !-->
      <!-- <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            2. LOCAL REVENUE CODE (LRC)
          </h4>
          <h6 class="header-no-margin" style="color:#fff;">
            Please submit copies of your LRC through any of the following mode:
          </h6>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-striped">
            <tr>
              <td class="text-right" style="width:250px;">
                <div style="font-size:16px;">
                  <?= Html::label('Local Revenue Code URL', 'LrcUrl',['class'=>'control-label']) ?>
                </div>
              </td>
              <td >
                <?= $form->field($model, 'LrcUrl')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize, 'style' => 'width:100% !important;'])->label(false)?>
              </td>
            </tr>
            <tr>
              <td class="text-right" style="width:250px;">
                <?= Html::label('Effectivity Date of Local Revenue Code', 'LrcUrl',['class'=>'control-label']) ?>
              </td>
              <td>
                <?= $form->field($model, 'EffectivityDateLRC')->textInput(['type' => 'date','readOnly'=>$readOnlyFinalize])->label(false)?>
              </td>
            </tr>
          </table>
        </div>
      </div> -->

      <div class="panel panel-primary no-panel-border" style="margin-bottom:0px !important;">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;">
            CONTACT PERSON
          </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <?php
            $modelContactPartOne['LguProfileId'] = $id;
            $modelContactPartOne['PartNo'] =1;
          ?>
          <table class="table table-striped">
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Name', 'ConatactName',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartOne, 'ConatactName')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnameid'])->label(false) ?>
              </td>

              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Email Address', 'ContactEmail',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartOne, 'ContactEmail')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactemailid'])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Designation', 'ContactDesignation',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartOne, 'ContactDesignation')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactdesignationid'])->label(false) ?>
              </td>

              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Contact Number', 'ContactNo',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartOne, 'ContactNo')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnumberid'])->label(false) ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $form->field($model, 'MunicipalityCityId')->hiddenInput()->label(false) ?>
<?= $form->field($modelContactPartOne, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelContactPartOne, 'PartNo')->hiddenInput()->label(false) ?>

<?php ActiveForm::end(); ?>

<?php
  //Kartik Pdf
  function actionReport() {
    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('_reportView');
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE,
        // A4 paper format
        'format' => Pdf::FORMAT_A4,
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER,
        // your html content input
        'content' => $content,
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}',
        // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
        // call mPDF methods on the fly
        'methods' => [
            'SetHeader'=>['Krajee Report Header'],
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);

    // return the pdf output as per the destination setting
    return $pdf->render();
  }

  // Newline
$script = <<< JS
$(document).ready(function() {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

 if( $('#contactnameid').val()){
  $('#nextbutton').prop('disabled', false);

 }
//  $("#nextbutton").click(function(e) {
//     e.preventDefault();
//     $.ajax({
//       type: "POST",
//       url: "lgu-profile/nextstep1",
//       data: {
//         id: $("#button_1").val(),
//         access_token: $("#access_token").val()
//       },
//       success: function(result) {
//         alert('ok');
//       },
//       error: function(result) {
//         alert('error');
//       }
//     });
//   });
 $('#contactnameid').change(function() {
  if($('#contactnameid').val()==""){
            $('#contactnameid').addClass("incorrectinput");
            $('#contactnameid').removeClass("correctinput");
          }
          else{
             $('#contactnameid').addClass("correctinput");
             $('#contactnameid').removeClass("incorrectinput");
          }
});
$('#contactdesignationid').change(function() {
  if($('#contactdesignationid').val()==""){
            $('#contactdesignationid').addClass("incorrectinput");
            $('#contactdesignationid').removeClass("correctinput");
          }
          else{
             $('#contactdesignationid').addClass("correctinput");
             $('#contactdesignationid').removeClass("incorrectinput");
          }
});
$('#contactnumberid').change(function() {
  if($('#contactnumberid').val()==""){
            $('#contactnumberid').addClass("incorrectinput");
            $('#contactnumberid').removeClass("correctinput");
          }
          else{
             $('#contactnumberid').addClass("correctinput");
             $('#contactnumberid').removeClass("incorrectinput");
          }
});
$('#contactemailid').change(function() {
  if(!emailReg.test($('#contactemailid').val())){

            $('#contactemailid').addClass("incorrectinput");
            $('#contactemailid').removeClass("correctinput");
          }

          else{

            $('#contactemailid').addClass("correctinput");
             $('#contactemailid').removeClass("incorrectinput");
          }


          if($('#contactemailid').val()==""){
            $('#contactemailid').addClass("incorrectinput");
            $('#contactemailid').removeClass("correctinput");
          }




});
     $('#contactnameid').keyup(function() {
        if($('#contactnameid').val() != '' && $('#contactdesignationid').val() != '' && $('#contactnumberid').val() != '' && $('#contactemailid').val() != '' && emailReg.test($('#contactemailid').val())) {

          $('#nextbutton').prop('disabled', false);


        }
        else{
          $('#nextbutton').prop('disabled', true);


        }
     });
     $('#contactdesignationid').keyup(function() {
        if($('#contactnameid').val() != '' && $('#contactdesignationid').val() != '' && $('#contactnumberid').val() != '' && $('#contactemailid').val() != '' && emailReg.test($('#contactemailid').val())) {

          $('#nextbutton').prop('disabled', false);
        }
        else{
          $('#nextbutton').prop('disabled', true);
        }
     });
     $('#contactnumberid').keyup(function() {
        if($('#contactnameid').val() != '' && $('#contactdesignationid').val() != '' && $('#contactnumberid').val() != '' && $('#contactemailid').val() != '' && emailReg.test($('#contactemailid').val())) {

          $('#nextbutton').prop('disabled', false);
        }
        else{
          $('#nextbutton').prop('disabled', true);
        }
     });
     $('#contactemailid').keyup(function() {
        if($('#contactnameid').val() != '' && $('#contactdesignationid').val() != '' && $('#contactnumberid').val() != '' && $('#contactemailid').val() != '' && emailReg.test($('#contactemailid').val())) {

          $('#nextbutton').prop('disabled', false);
        }
        else{
          $('#nextbutton').prop('disabled', true);


        }
     });
 });
function sumNew()
{
  if($('#lguprofile-new_business_corporation').val() == "")
  {
    $('#lguprofile-new_business_corporation').val(0);
  }
  if($('#lguprofile-new_business_cooperative').val() == "")
  {
    $('#lguprofile-new_business_cooperative').val(0);
  }
  if($('#lguprofile-new_business_signle').val() == "")
  {
    $('#lguprofile-new_business_signle').val(0);
  }
  if($('#lguprofile-new_business_partnership').val() == "")
  {
    $('#lguprofile-new_business_partnership').val(0);
  }
  var corporation = parseInt($('#lguprofile-new_business_corporation').val());
  var cooperative = parseInt($('#lguprofile-new_business_cooperative').val());
  var singlePro = parseInt($('#lguprofile-new_business_signle').val());
  var partnership = parseInt($('#lguprofile-new_business_partnership').val());

  var sum = corporation + cooperative + singlePro + partnership;
  return sum;
}
function sumRenew()
{
  if($('#lguprofile-renew_business_corporation').val() == "")
  {
    $('#lguprofile-renew_business_corporation').val(0);
  }
  if($('#lguprofile-renew_business_cooperative').val() == "")
  {
    $('#lguprofile-renew_business_cooperative').val(0);
  }
  if($('#lguprofile-renew_business_single').val() == "")
  {
    $('#lguprofile-renew_business_single').val(0);
  }
  if($('#lguprofile-renew_business_partnership').val() == "")
  {
    $('#lguprofile-renew_business_partnership').val(0);
  }
  var corporation = parseInt($('#lguprofile-renew_business_corporation').val());
  var cooperative = parseInt($('#lguprofile-renew_business_cooperative').val());
  var singlePro = parseInt($('#lguprofile-renew_business_single').val());
  var partnership = parseInt($('#lguprofile-renew_business_partnership').val());

  var sum = corporation + cooperative + singlePro + partnership;
  return sum;
}
function grandTotal()
{
  var newBus = sumNew();
  var renewBus = sumRenew();
  var grandTotal = newBus + renewBus;
  return grandTotal;
}
$( document ).ready(function() {
    $('#totalNew').val(sumNew());
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('input[type="number"]').on('keydown',function(e){
  // Allow: backspace, delete, tab, escape, enter and .
  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
        $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#contactnumberid').on('keydown',function(e){
  // Allow: backspace, delete, tab, escape, enter and .
  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }

});
$('#lguprofile-new_business_corporation').on('keydown',function(e){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_cooperative').on('keydown',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_signle').on('keydown',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_partnership').on('keydown',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_corporation').on('keydown',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_cooperative').on('keydown',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_single').on('keydown',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_partnership').on('keydown',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});

//////
$('#lguprofile-new_business_corporation').on('change',function(e){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_cooperative').on('change',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_signle').on('change',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-new_business_partnership').on('change',function(){
    $('#totalNew').val(sumNew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_corporation').on('change',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_cooperative').on('change',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_single').on('change',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});
$('#lguprofile-renew_business_partnership').on('change',function(){
    $('#totalRenew').val(sumRenew());
    $('#grandTotal').val(grandTotal());
});

$('#lguprofile-incomeclassid').on('change',function(){
    var incomeClass = document.getElementsByName('LguProfile[IncomeClassId]');
    var length = incomeClass.length;
    for (var i = 0; i < length; i++)
    {
      if (incomeClass[i].checked)
      {
        if(incomeClass[i].value == "8")
        {
          document.getElementById("lguprofile-otherclass").readOnly = false;
        }else{
          document.getElementById("lguprofile-otherclass").readOnly = true;
          $('#lguprofile-otherclass').val("");
        }
      }
    }
});
JS;
$this->registerJs($script);
?>
