<?php
  use yii\helpers\Html;
  use yii\helpers\ArrayHelper;
  use yii\widgets\ActiveForm;
  //use yii\bootstrap\ActiveForm;
  use yii\console\widgets\Table;
  use app\models\LguServer;
  use app\models\SoftwareOs;
  use app\models\LguOsOther;
  use app\models\FrontlineService;
  use app\models\LguFrontlineService;
  use app\models\LguFrontlineServiceOther;
  use yii\helpers\Url;
  use app\models\LguProfile;
  use app\models\Coachlgu;
?>

<!-- ICT ENVIRONMENT FORM !-->
<div class="container-fluid ict-environment-form no-side-padding">
  <?php
    $form = ActiveForm::begin([
        //'layout'=>'horizontal',
        'id' => 'ict-environment-form',
        'enableClientValidation'=>false,
      ]
    );
    //> Print Button function <//
    $lguProfile = LguProfile::find()->all();
    $usertype =Yii::$app->user->identity->UserType;
    if($usertype ==3) {
      $print = Coachlgu::find()->where(['PsgcMunicipalityCityId' => $id,'CoachId'=> Yii::$app->user->identity->CoachId])->all();
      $printid =$print[0]->PsgcMunicipalityCityId;
    }
    else{
      $printid = $id;
    }
    if($isFinalized == 1)
    {
      echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/index.php/lgu-profile/mpdf-demo1', 'id' => $printid]), ['class' => 'btn btn-danger pull-right','target'=>'_blank', 'style' => 'margin-top:19px; margin-right:15px;']) ;
      $readOnlyFinalize = true;
      $disableFinalize = true;
    }else{
      $readOnlyFinalize = false;
      $disableFinalize = false;
    }
  ?>

  <div class="panel panel-default">
    <div id="panel-heading-title" class="panel-heading">
      <h2 class="header-no-margin">
        PART III A. Information and Communications Technology Environment
      </h2>
    </div>
    <div class="panel-body no-padding">
      <!-- 1. Hardware !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;">
            1. HARDWARE
          </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12">
              <h4 class="header-no-margin"> 1.a Computing Devices.  Please specify the number of working/operational units </h4>
            </div>
          </div>
          <table class="table table-striped ict-environment-table">
            <tr>
              <td style="vertical-align:middle;" class="active text-center">
                <h5 class="font-weight__bold"> COMPUTING DEVICE </h5>
              </td>
              <td style="vertical-align:middle;" class="active text-center">
                <h5 class="font-weight__bold"> NO OF UNITS </h5>
              </td>
            </tr>

            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  a.&nbsp;&nbsp;Desktop computer
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'DesktopComputer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>

            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  b.&nbsp;&nbsp;Laptop&nbsp;/&nbsp;Notebook&nbsp;/&nbsp;Netbook
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'Laptop')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td class="">
                <p class="header-no-margin" style="vertical-align:middle;">
                  c.&nbsp;&nbsp;Servers:
                </p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="margin-left:15px;">
                  Application Server
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'ApplicationServer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style=" margin-left:15px;">
                  Web Server
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'WebServer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="margin-left:15px;">
                  Database Server
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'DBServer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="margin-left:15px;">
                  File Server
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'FileServer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="margin-left:15px;">
                  Mail Server
                </p>
              </td>
              <td>
              <?= $form->field($modelComputingDevice, 'MailServer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  d.&nbsp;&nbsp;Tablets
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'Tablets')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  d.&nbsp;&nbsp;Smart Phone (Office unit)
                </p>
              </td>
              <td>
                <?= $form->field($modelComputingDevice, 'SmartPhones')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
          </table>

          <!-- Hardware Peripherals !-->
          <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12">
              <h4 class="header-no-margin">  1.b <b>Hardware Peripherals.</b> Please specify the number of <b>working/operational</b> units. </h4>
            </div>
          </div>
          <table class="table table-striped ict-environment-table">
            <tr>
              <td style="vertical-align:middle;" class="text-center">
                <h5 class="font-weight__bold"> HARDWARE PERIPHERALS </h5>
              </td>
              <td style="vertical-align:middle;" class="text-center">
                <h5 class="font-weight__bold"> NO OF UNITS </h5>
              </td>
            </tr>

            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  a.&nbsp;&nbsp;Multi-function printer (print, scan, copy, fax)
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'MultiPrinter')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>

            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  b.&nbsp;&nbsp;Printer
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'Printer')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td colsspan="2" class="">
                <p class="header-no-margin" style="vertical-align:middle;">
                  c.&nbsp;&nbsp;Document Scanner
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'DocScanner')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  d.&nbsp;&nbsp;Uninterruptible Power Supply (UPS)
                </p>
              </td>
              <td>
              <?= $form->field($modelHardwarePeripherals, 'UPS')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  e.&nbsp;&nbsp;Generator Set
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'GenSet')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  f.&nbsp;&nbsp;Fingerprint Scanner (Biometric)
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'Biometric')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <p class="header-no-margin" style="vertical-align:middle;">
                  g.&nbsp;&nbsp;Access Card Scanner
                </p>
              </td>
              <td>
                <?= $form->field($modelHardwarePeripherals, 'AccessCard')->textInput(['type' => 'number','min'=>0,'readOnly'=>$readOnlyFinalize])->label(false) ?>
              </td>
            </tr>
          </table>

          <!-- Number of Servers  by Capacity and by Location !-->
          <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12">
              <h4 class="header-no-margin"> 1.c Number of Servers by Capacity and by Location </h4>
            </div>
          </div>
          <?php
            $countLguServer = LguServer::find()->where(['LguProfileId'=>$id])->count();
            $capacityStorage = array("","","");
            $inhouse = array("","","");
            $colocated = array("","","");

            if($countLguServer > 0)
            {
              $lguServer = LguServer::find()->where(['LguProfileId'=>$id])->all();
              $a = 0;
              foreach($lguServer as $server)
              {
                $capacityStorage[$a] = $server['CapicityStorage'];
                $inhouse[$a] = $server['InHouse'];
                $colocated[$a] = $server['CoLocated'];
                $a++;
              }
            }
          ?>
          <div class="ict-environment-table_section">
            <table class="table table-striped ict-environment-table" width="100%">
              <tr>
                <td style="vertical-align:middle;" class="text-center" rowspan="2">
                  <h5 class="header-no-margin font-weight__bold">
                    CAPACITY OF STORAGE
                  </h5>
                  <p style="margin:8px 0px 0px 0px;">
                    (e.g. 4TB and above, 2TB to 4TB, 2TB below)
                  </p>
                </td>
                <td style="vertical-align:middle;" class="text-center" colspan="2">
                  <h5 class="header-no-margin"> No. of Unit by LOCATION </h5>
                </td>
              </tr>
              <tr>
                <td class="text-center active" style="vertical-align:middle;">
                  <h5 class="header-no-margin">
                    IN-HOUSE
                  </h5>
                </td>
                <td class="text-center active" style="vertical-align:middle;">
                  <h5 class="header-no-margin">
                    CO-LOCATED
                  </h5>
                </td>
              </tr>

              <!-- 1 !-->
              <tr>
                <td>
                  <?php echo Html::input('text','capacityStorage1',$capacityStorage[0],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?>
                </td>
                <td>
                  <?php echo Html::input('number','inHouse1',$inhouse[0],['class'=>'form-control','min'=>0,'readOnly'=>$readOnlyFinalize, 'style' => 'width:100% !important;']);?>
                </td>
                <td>
                  <?php echo Html::input('number','colocated1',$colocated[0],['class'=>'form-control','min'=>0, 'style' => 'width:100% !important;','readOnly'=>$readOnlyFinalize]);?>
                </td>
              </tr>

              <tr>
                <td>
                  <?php echo Html::input('text','capacityStorage2',$capacityStorage[1],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?>
                </td>
                <td>
                  <?php echo Html::input('number','inHouse2',$inhouse[1],['class'=>'form-control','min'=>0, 'style' => 'width:100% !important;','readOnly'=>$readOnlyFinalize]);?>
                </td>
                <td>
                  <?php echo Html::input('number','colocated2',$colocated[1],['class'=>'form-control','min'=>0, 'style' => 'width:100% !important;','readOnly'=>$readOnlyFinalize]);?>
                </td>
              </tr>

              <tr>
                <td>
                  <?php echo Html::input('text','capacityStorage3',$capacityStorage[2],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?>
                </td>
                <td>
                  <?php echo Html::input('number','inHouse3',$inhouse[2],['class'=>'form-control','min'=>0, 'style' => 'width:100% !important;','readOnly'=>$readOnlyFinalize]);?>
                </td>
                <td>
                  <?php echo Html::input('number','colocated3',$colocated[2],['class'=>'form-control','min'=>0, 'style' => 'width:100% !important;','readOnly'=>$readOnlyFinalize]);?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <!-- 2. SOFTWARE !-->
      <div class="panel panel-primary no-panel-border">
          <div class="panel-heading">
            <h3 class="header-no-margin" style="color:#fff;">
              2. SOFTWARE
            </h3>
            <p style="margin:8px 0px 0px 0px;">
              Please check (&nbsp;<i class="glyphicon glyphicon-ok"></i>&nbsp;) which of the following Operating Systems is/are installed in your workstations and servers.
            </p>
          </div>
          <div class="panel-body" style="padding-bottom:0px;">
            <!-- 2.a OS Workstations !-->
            <div class="row" style="margin-bottom:8px;">
              <div class="col-md-12">
                <h4 class="header-no-margin">
                  2.a Operating System for Workstations (desktop and laptops)
                </h4>
                <div style="padding:15px;">
                  <?php
                    $softwareOsWork = SoftwareOs::find()->where(['WorkstationServer'=>1])->all();
                    $osListWork = [];
                    foreach($softwareOsWork as $softOsWork)
                    {
                      $osListWork[$softOsWork['Id']] = $softOsWork['OSDescription'];
                      ///echo "<div class='col-md-4 no-side-padding os-workstations-cb bg-light'>".$form->field($modelOs,'OSServer')->checkbox(['label'=>$softOsWork['OSDescription'],'value'=>$softOsWork['Id']])->label(false)."</div>";
                    }
                    echo $form->field($modelOs, 'OSWorkstation')->checkboxList($osListWork, ['separator' => ''])->label(false);
                    $modelOs['OSWorkstation'] = explode(",",$modelOs['OSWorkstation']);

                  ?>
                </div>
              </div>
            </div> <!-- OS Workstations !-->
            <!-- 2.b OS Servers !-->
            <div class="row" style="margin-bottom:8px;">
              <div class="col-md-12">
                <h4 class="header-no-margin">
                  2.b Operating System for Servers
                </h4>
                <div style="padding:15px;">
                  <?php
                    $softwareOsServer = SoftwareOs::find()->where(['WorkstationServer'=>2])->all();

                    $osListServer = [];

                    foreach($softwareOsServer as $softOsServer)
                    {
                      //echo "<div class='col-md-4 no-side-padding os-workstations-cb bg-light'>".$form->field($modelOs, 'OSServer')->checkbox(['label'=>$softOsServer['OSDescription'],'value'=>$softOsServer['Id']])->label(false)."</div>";
                      $osListServer[$softOsServer['Id']] = $softOsServer['OSDescription'];
                    }
                    echo $form->field($modelOs, 'OSServer')->checkboxList($osListServer)->label(false);
                    $modelOs['OSServer'] = explode(",",$modelOs['OSServer']);
                  ?>
                </div>
              </div>
            </div> <!-- OS Servers !-->
            <!-- 2.c Frontline Services !-->
            <div class="row">
              <div class="col-md-12">
                <h4 class="header-no-margin">
                  2.c  Please check (&nbsp;<i class="glyphicon glyphicon-ok"></i>&nbsp;) which systems are already COMPUTERIZED and OPERATIONAL in your office
                </h4>
                <p style="margin:8px 0px; font-size:16px;" class="font-weight__bold"> FRONTLINE SERVICES: </p>
                <table class="table table-striped hr-capacity-table">
                  <thead>
                    <tr class="active">
                      <th> Name of System </th>
                      <th>On-Premise</th>
                      <th>Online </th>
                      <th>Electronic Payment</th>
                      <th>If online,  please specify the URL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $frontlineService = FrontlineService::find()->all();
                      foreach($frontlineService as $fs)
                      {
                        $lguFS = LguFrontlineService::findOne(['LguProfileId'=>$id,'FrontlineServiceId'=>$fs['Id']]);
                        if($lguFS['Online'] == 1)
                        {
                          $readOnlyBox = false;
                        }else{
                          $readOnlyBox = true;
                        }
                        echo "<tr>";
                        if($fs['Id'] > 6)
                          {echo "<td class='lrc font-weight__bold'><p class='header-no-margin'>".$fs['Description']."</p></td>";}
                        else{
                          {echo "<td class='font-weight__bold'>".$fs['Description']."</td>";}
                        }
                        echo "<td><center>";
                          if($fs['Id'] != 6)
                          {echo Html::checkboxList($fs['Id']."OnPremise",$lguFS['OnPremise'],[1=>''],['itemOptions'=>['id'=>$fs['Id']."OnPremise"]]);}
                        echo "</center></td>";
                        echo "<td><center>";
                          if($fs['Id'] != 6)
                          {echo Html::checkboxList($fs['Id']."Online",$lguFS['Online'],[1=>''],['itemOptions'=>['id'=>$fs['Id']."Online"]]);}
                        echo "</center></td>";
                        echo "<td><center>";
                          if($fs['Id'] != 6)
                          {echo Html::checkboxList($fs['Id']."ePayment",$lguFS['ePayment'],[1=>''],['itemOptions'=>['id'=>$fs['Id']."ePayment"]]);}
                        echo "</center></td>";
                        echo "<td ><center>";
                          if($fs['Id'] != 6)
                          {echo Html::input('text',$fs['Id']."Url",$lguFS['OnlineUrl'],['class'=>'form-control','id'=>$fs['Id']."Url",'readOnly'=>$readOnlyBox]);}
                        echo "</center></td>";
                        echo "</tr>";
                      }
                    ?>
                    <?php
                      $countOtherFs = LguFrontlineServiceOther::find()->where(['LguProfileId'=>$id])->count();
                      $otherFsList = array("","","");
                      $otherFsOnPremise = array("","","");
                      $otherFsOnline = array("","","");
                      $otherFsePayment = array("","","");
                      $otherFsUrl = array("","","");
                      $readOnlyBox1 = array("","","");

                      if($countOtherFs > 0)
                      {
                        $otherFrontline = LguFrontlineServiceOther::find()->where(['LguProfileId'=>$id])->all();
                        $a=0;
                        foreach($otherFrontline as $otherFs)
                        {
                          $otherFsList[$a] = $otherFs['OtherName'];
                          $otherFsOnPremise[$a] = $otherFs['OnPremise'];
                          $otherFsOnline[$a] = $otherFs['Online'];
                          $otherFsePayment[$a] = $otherFs['ePayment'];
                          $otherFsUrl[$a] = $otherFs['OnlineUrl'];
                          if($otherFs['Online'] == 1)
                          {
                            $readOnlyBox1[$a]=false;
                          }else {
                            $readOnlyBox1[$a]=true;
                          }
                          $a++;
                        }
                      }
                    ?>
                  <tr>
                    <td colspan = 5>Other, please specify:</td>
                  </tr>
                  <tr>
                    <td><?php echo Html::input('text','otherFs1',$otherFsList[0],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?></td>
                    <td><center><?php echo Html::checkboxList("otherFs1OnPremise",$otherFsOnPremise[0],[1=>''],['itemOptions'=>['id'=>"OtherFs1OnPremise"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs1Online",$otherFsOnline[0],[1=>''],['itemOptions'=>['id'=>"OtherFs1Online"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs1ePayment",$otherFsePayment[0],[1=>''],['itemOptions'=>['id'=>"OtherFs1ePayment"]]);?></center></td>
                    <td><?php echo Html::input('text','otherFs1Url',$otherFsUrl[0],['class'=>'form-control','id'=>'otherFs1Url','readOnly'=>$readOnlyBox1[0]]);?></td>
                  </tr>
                  <tr>
                    <td><?php echo Html::input('text','otherFs2',$otherFsList[1],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?></td>
                    <td><center><?php echo Html::checkboxList("otherFs2OnPremise",$otherFsOnPremise[1],[1=>''],['itemOptions'=>['id'=>"OtherFs2OnPremise"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs2Online",$otherFsOnline[1],[1=>''],['itemOptions'=>['id'=>"OtherFs2Online"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs2ePayment",$otherFsePayment[1],[1=>''],['itemOptions'=>['id'=>"OtherFs2ePayment"]]);?></center></td>
                    <td><?php echo Html::input('text','otherFs2Url',$otherFsUrl[1],['class'=>'form-control','id'=>'otherFs2Url','readOnly'=>$readOnlyBox1[1]]);?></td>
                  </tr>
                  <tr>
                    <td><?php echo Html::input('text','otherFs3',$otherFsList[2],['class'=>'form-control','readOnly'=>$readOnlyFinalize]);?></td>
                    <td><center><?php echo Html::checkboxList("otherFs3OnPremise",$otherFsOnPremise[2],[1=>''],['itemOptions'=>['id'=>"OtherFs3OnPremise"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs3Online",$otherFsOnline[2],[1=>''],['itemOptions'=>['id'=>"OtherFs3Online"]]);?></center></td>
                    <td><center><?php echo Html::checkboxList("otherFs3ePayment",$otherFsePayment[2],[1=>''],['itemOptions'=>['id'=>"OtherFs3ePayment"]]);?></center></td>
                    <td><?php echo Html::input('text','otherFs3Url',$otherFsUrl[2],['class'=>'form-control','id'=>'otherFs3Url','readOnly'=>$readOnlyBox1[2]]);?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- Frontline Services !-->

            <!--Foot note !-->
            <div class="row">
              <div class="col-md-12">
                <b>On-premise</b> – services available within the locality/on the premises of the LGU only<br>
                <b>Online</b> – services available from the internet<br>
                <b>URL</b> – means universal resource locator; it is the reference or address to access the service in the internet (e.g. www.service.gov.ph)<br>
              </div>
            </div> <!-- !-->
          </div>
      </div> <!-- SOFTWARE !-->

      <!-- Administrative Services !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;"> Administrative Systems </h4>
          <p style="margin:5px 0px;"> Please check (&nbsp;<i class="glyphicon glyphicon-ok"></i>&nbsp;) which systems are already <b>COMPUTERIZED</b> and <b>OPERATIONAL</b> in your office </p>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <tr>
              <td>
                <?php echo $form->field($modelOs, 'CBMS')->checkbox(['label' => 'Community-Based Monitoring System (CBMS)', 'value' => '1'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
              <td>
                <?php echo $form->field($modelOs, 'ProcurementSystem')->checkboxList(['1'=>'Procurement System'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $form->field($modelOs, 'HRMIS')->checkboxList(['1'=>'Human Resource Management Information System (HRMIS)'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
              <td>
                <?php echo $form->field($modelOs, 'ProjectMonitoringSystem')->checkboxList(['1'=>'Project Monitoring System'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $form->field($modelOs, 'LGPMS')->checkboxList(['1'=>'Local Government Performance Measurement System (LGPMS)'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
              <td>
                <?php echo $form->field($modelOs, 'RecordsManagementSystem')->checkboxList(['1'=>'Records Management System'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $form->field($modelOs, 'PayrollSystem')->checkboxList(['1'=>'Payroll System '], ['class' => 'checkboxAd'])->label(false);?>
              </td>
              <td>
                <?php echo $form->field($modelOs, 'DocumentTrackingSystem')->checkboxList(['1'=>'Document Tracking System'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>
              <?php echo $form->field($modelOs, 'PIS')->checkboxList(['1'=>'Personnel Information System'], ['class' => 'checkboxAd'])->label(false);?>
              </td>
              <td></td>
            </tr>
              <?php
                $countOsOther = LguOsOther::find()->where(['LguOSAdminId'=>$modelOs['Id']])->count();
                $osAdminOther = array("","","");


                if($countLguServer > 0)
                {
                  $lguOsOther= LguOsOther::find()->where(['LguOSAdminId'=>$modelOs['Id']])->all();
                  $a = 0;
                  foreach($lguOsOther as $osOther)
                  {
                    $osAdminOther[$a] = $osOther['OtherName'];
                    $a++;
                  }
                }
              ?>
            <tr>
              <td colspan="2">
                <div style="margin-top:8px; margin-bottom:8px;">
                  <h4 class="header-no-margin">
                    Others please specify:
                  </h4>
                </div>
                <?php echo Html::input('text','adminSystem1',$osAdminOther[0],['class'=>'form-control','readonly'=>$readOnlyFinalize, 'style'=> 'width:500px !important;']);?>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <?php echo Html::input('text','adminSystem2',$osAdminOther[1],['class'=>'form-control','readonly'=>$readOnlyFinalize, 'style'=> 'width:500px !important;']);?>
              </td>
            </tr>
            <tr>
              <td colspan="2">
              <?php echo Html::input('text','adminSystem3',$osAdminOther[2],['class'=>'form-control','readonly'=>$readOnlyFinalize, 'style'=> 'width:500px !important;']);?>
              </td>
            </tr>
          </table>
        </div>
      </div> <!-- Administrative Services !-->
      <!-- 3. NETWORK !-->
      <div class="panel panel-primary no-panel-border" style="margin-bottom:0px !important;">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;"> 3. NETWORK </h3>
        </div>
        <div class="panel-body">
          <?php
            if($isFinalized == 1)
            {
              $disableInternet = true;
            }else{
              if($modelNetwork['Intrenet'] == 1)
              {
                $disableInternet = false;
              }else{
                $disableInternet = true;
              }
            }
          ?>
          <div class="row">
            <div class="col-md-12">
              <h4 class="header-no-margin">
                3.a Which of the following network resources does your LGU have?
              </h4>
              <table class="table table-striped" style="margin-top: 8px;">
                <tr>
                  <td>
                    <h4 style="margin:12px 10px; vertical-align:middle; color:#000;" class="font-weight__bold network-categories">
                      <?php echo $form->field($modelNetwork, 'Intranet')->checkboxList(['1' => 'Intranet'], ['class' => 'netTitle'], ['itemOptions' => ['disabled' => $disableFinalize]])->label(false); ?>
                    </h4>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <!-- INTRANET OPTIONS !-->
                    <div style="margin-left:20px;">
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'LAN')->checkboxList(['1' => 'Local Area Network (LAN)'], ['class' => 'table2'], ['itemOptions' => ['disabled' => $disableFinalize]])->label(false); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'WAN')->checkboxList(['1' => 'Wide Area Network (WAN)'], ['class' => 'table2'], ['itemOptions' => ['disabled' => $disableFinalize]])->label(false); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'VPN')->checkboxList(['1' => 'Virtual Private Network (VPN)'], ['class' => 'table2'], ['itemOptions' => ['disabled' => $disableFinalize]])->label(false); ?>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td></td>
                </tr>
                <!-- Internet  Connection !-->
                <tr>
                  <td>
                    <h4 style="margin:12px 10px; vertical-align:middle; color:#000;" class="font-weight__bold network-categories">
                      <?php echo $form->field($modelNetwork, 'Intrenet')->checkboxList(['1'=>'Internet Connection'], ['class' => 'netTitle'],['itemOptions'=>['id'=>"Intrenet",'disabled'=>$disableFinalize]])->label(false);?>
                    </h4>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <p style="margin:0px 10px 8px 10px; font-weight:normal !important;"> If available, please indicate your model/s of access to the Internet: </p>
                    <!-- Internet Connection OPTIONS !-->
                    <div style="margin-left:20px;">
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'LeasedLine')->checkboxList(['1'=>'Leased line'],['class' => 'table2'],['itemOptions'=>['id'=>"LeasedLine",'disabled'=>$disableInternet]])->label(false);?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'DSL')->checkboxList(['1'=>'Digital Subscriber Line (DSL)'],['class' => 'table2'],['itemOptions'=>['id'=>"DSL",'disabled'=>$disableInternet]])->label(false);?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'MobileData')->checkboxList(['1'=>'Mobile Data'],['class' => 'table2'],['itemOptions'=>['id'=>"MobileData",'disabled'=>$disableInternet]])->label(false);?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'ISDN')->checkboxList(['1'=>'Integrated Services Digital Network (ISDN)'],['class' => 'table2'],['itemOptions'=>['id'=>"ISDN",'disabled'=>$disableInternet]])->label(false);?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelNetwork, 'Satellite')->checkboxList(['1'=>'Satellite'],['class' => 'table2'],['itemOptions'=>['id'=>"Satellite",'disabled'=>$disableInternet]])->label(false);?>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td></td>
                </tr>

                <!-- Internet Service Provider !--> <tr>
                  <td>
                    <h4 style="margin:12px 10px; vertical-align:middle; color:#000;" class="font-weight__bold network-categories">
                    <?php echo $form->field($modelNetwork, 'ISP')->checkboxList(['1' => 'Internet Service Provider (ISP)'], ['class' => 'netTitle'], ['itemOptions' => ['id' => "ISP", 'disabled' => $disableInternet]])->label(false); ?>
                    </h4>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <!-- INTRANET OPTIONS !-->
                    <div style="margin-left:20px;">
                      <p> Please specify the unit: e.g. kbps, mbps, gbps </p>
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table">
                            <!-- Provider 1 !-->
                            <tr>
                              <td style="vertical-align:middle;">
                                <h5 class="header-no-margin font-weight__bold text-right"> Provider </h5>
                              </td>
                              <td>
                                <?= $form->field($modelNetwork, 'ISPProvider1', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align:middle;">
                                <h5 class="header-no-margin font-weight__bold text-right"> Bandwidth </h5>
                              </td>
                              <td>
                                <?= $form->field($modelNetwork, 'Bandwidth1', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                              </td>
                            </tr>
                            <!-- Provider 2 !-->
                            <tr>
                              <td style="vertical-align:middle;">
                                <h5 class="header-no-margin font-weight__bold text-right"> Provider </h5>
                              </td>
                              <td>
                              <?= $form->field($modelNetwork, 'ISPProvider2', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align:middle;" >
                                <h5 class="header-no-margin font-weight__bold text-right"> Bandwidth </h5>
                              </td>
                              <td>
                              <?= $form->field($modelNetwork, 'Bandwidth2', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                              <?= $form->field($modelNetwork, 'NoEmployeeInternet', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                              <?= $form->field($modelNetwork, 'NoEmployeeEmail', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td></td>
                </tr>

              </table>
            </div>
          </div>
          <!-- 3.b Security, Disaster Recovery and Back-up !-->
          <div class="row" >
            <div class="col-md-12">
              <h4 class="header-no-margin">
                3.b Security, Disaster and Back-up
              </h4>
              <table class="table table-striped" style="margin-top:8px;">
                <tr>
                  <td style="vertical-align:middle;">
                    <h5 class="header-no-margin"> <b>a.</b> Does your LGU have a protection scheme for your ICT resource? </h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="margin-left: 20px;">
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelSecurity, 'ProtectionScheme')->radioList(['1'=>'Yes','0'=>'No'])->label(false); ?>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align:middle;">
                    <h5 class="header-no-margin">
                      <b>b.</b> If yes, what is/are the security resource/s being used by your office? (Check all that applies.)
                    </h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="margin-left: 20px;">
                      <div class="row">
                        <div class="col-md-6">
                          <?php echo $form->field($modelSecurity, 'SecurityPolicy')->checkboxList(['1'=>'Security Policy / Guideline'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'DisasterRecoveryPlan')->checkboxList(['1'=>'Disaster Recovery Plan'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'DigitalSecurity')->checkboxList(['1'=>'Digital Signatures'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'Encryption')->checkboxList(['1'=>'Encryption'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'UPS')->checkboxList(['1'=>'Back-up power unit (e.g. UPS, Generator)'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'HardwareFirewall')->checkboxList(['1'=>'Hardware firewall'], ['class' => 'checkboxAd'])->label(false);?>
                        </div>
                        <div class="col-md-6">
                          <?php echo $form->field($modelSecurity, 'SoftwareFirewall')->checkboxList(['1'=>'Software firewall'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'SubSecuritySoft')->checkboxList(['1'=>'Subscription to a security service (e.g. anti-virus software, intrusion detection system)'], ['class' => 'checkboxSecu2'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'EmailAuth')->checkboxList(['1'=>'E-mail authentication software'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'OffsiteBackup')->checkboxList(['1'=>'Off-site back-up'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'SecuredServer')->checkboxList(['1'=>'OSecured servers'], ['class' => 'checkboxAd'])->label(false);?>
                          <?php echo $form->field($modelSecurity, 'Storagebackup')->checkboxList(['1'=>'Storage back-up media in localities other than the operating environment'], ['class' => 'checkboxSecu2'])->label(false);?>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align:middle;">
                    <h5 class="header-no-margin"> <b>c.</b> Does your LGU have an Information Systems Strategic Plan (ISSP) or ICT Plan?  </h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="margin-left: 20px;">
                      <div class="row">
                        <div class="col-md-12">
                          <?php echo $form->field($modelSecurity, 'ISSP')->radioList(['1'=>'Yes ','0'=>'No'],['itemOptions'=>['disabled'=>$disableFinalize]])->label(false); ?>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div> <!--NETWORK !-->

      <div class="panel panel-primary no-panel-border" style="margin-bottom:0px !important;">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;"> 4. CLOUD COMPUTING </h3>
        </div>
        <div class="panel-body">
          <!-- 4.a Cloud services provider !-->
          <div class="row">
            <div class="col-md-12">
              <h4 class="header-no-margin">
                4.a Cloud services provider
              </h4>
              <table class="table table-striped" style="margin-top:8px;">
                <!-- PROVIDER 1 !-->
                <tr>
                  <td style="vertical-align:middle;" class="text-right">
                    <h5 class="header-no-margin font-weight__bold"> Name of Provider </h5>
                  </td>
                  <td>
                    <?= $form->field($modelCloud, 'Provider1', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div style="margin-left:20px;">
                      <h5 class="header-no-margin"> Services (e.g. App Engine, App Service, AWS EC2): </h5>
                      <div class="row">
                        <div class="col-md-6">
                          <?= $form->field($modelCloud, 'Provider1Service1', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider1Service2', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider1Service3', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                        </div>
                        <div class="col-md-6">
                          <?= $form->field($modelCloud, 'Provider1Service4', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider1Service5', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider1Service6', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- PROVIDER 2 !-->
                <tr>
                  <td style="vertical-align:middle;" class="text-right">
                    <h5 class="header-no-margin font-weight__bold"> Name of Provider </h5>
                  </td>
                  <td>
                    <?= $form->field($modelCloud, 'Provider2', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize])->label(false) ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div style="margin-left:20px;">
                      <h5 class="header-no-margin"> Services (e.g. App Engine, App Service, AWS EC2): </h5>
                      <div class="row">
                        <div class="col-md-6">
                          <?= $form->field($modelCloud, 'Provider2Service1', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider2Service2', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider2Service3', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                        </div>
                        <div class="col-md-6">
                          <?= $form->field($modelCloud, 'Provider2Service4', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider2Service5', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                          <?= $form->field($modelCloud, 'Provider2Service6', ['options' => ['class' => 'cloudwid', ]])->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- 4.a !-->
          <!--  4.b LGU Website Hosting Sites !-->
          <div class="row">
            <div class="col-md-12">
              <h4 class="header-no-margin">
                4.b LGU Website Hosting Sites
              </h4>
              <table class="table table-striped" style="margin-top:8px;">
                <tr>
                  <td>
                    <h5 class="header-no-margin"> Please specify the hosting sites the LGU website uses if applicable (e.g. Xoom, GoDaddy): </h5>
                  </td>
                </tr>
                <tr>
                  <td>
                      <?= $form->field($modelCloud, 'WebHost1')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                      <?= $form->field($modelCloud, 'WebHost2')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize]) ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!--4.b !-->
        </div>
      </div>

      <div class="panel panel-primary no-panel-border" style="margin-bottom:0px !important;">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;"> ICT CONTACT PERSON </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px !important;">
          <table class="table table-striped">
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Name', 'ConatactName',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartthree, 'ConatactName')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnameid3'])->label(false) ?>
              </td>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Email Address', 'ContactEmail',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartthree, 'ContactEmail')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactemailid3'])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Designation', 'ContactDesignation',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartthree, 'ContactDesignation')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactdesigntaionid3'])->label(false) ?>
              </td>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Contact Number', 'ContactNo',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactPartthree, 'ContactNo')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnumberid3'])->label(false) ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div> <!-- panel body !-->
  </div> <!-- Container: panel panel-default !-->

</div> <!-- container-fluid !-->
<?php
    $modelComputingDevice['LguProfileId']=$id;
    $modelHardwarePeripherals['LguProfileId']=$id;
    $modelLguServer['LguProfileId']=$id;
    $modelOs['LguProfileId']=$id;
    $modelFrontline['LguProfileId']=$id;
    $modelNetwork['LguProfileId']=$id;
    $modelSecurity['LguProfileId']=$id;
    $modelCloud['LguProfileId']=$id;
    $modelContactPartthree['LguProfileId']=$id;
    $modelContactPartthree['PartNo'] =3;
?>
<?= $form->field($modelComputingDevice, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelHardwarePeripherals, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelLguServer, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelOs, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelFrontline, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelNetwork, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelSecurity, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelCloud, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelContactPartthree, 'LguProfileId')->hiddenInput()->label(false) ?>
<?= $form->field($modelContactPartthree, 'PartNo')->hiddenInput()->label(false) ?>
<?php ActiveForm::end(); ?>

<?php
$script = <<< JS
$( document ).ready(function() {
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if( $('#contactnameid3').val()){
  $('#last').prop('disabled', false);

 }
 $('#contactnameid3').change(function() {
  if($('#contactnameid3').val()==""){
            $('#contactnameid3').addClass("incorrectinput");
            $('#contactnameid3').removeClass("correctinput");
          }
          else{
             $('#contactnameid3').addClass("correctinput");
             $('#contactnameid3').removeClass("incorrectinput");
          }
});
$('#contactdesignationid3').change(function() {
  if($('#contactdesignationid3').val()==""){
            $('#contactdesignationid3').addClass("incorrectinput");
            $('#contactdesignationid3').removeClass("correctinput");
          }
          else{
             $('#contactdesignationid3').addClass("correctinput");
             $('#contactdesignationid3').removeClass("incorrectinput");
          }
});
$('#contactnumberid3').change(function() {
  if($('#contactnumberid3').val()==""){
            $('#contactnumberid3').addClass("incorrectinput");
            $('#contactnumberid3').removeClass("correctinput");
          }
          else{
             $('#contactnumberid3').addClass("correctinput");
             $('#contactnumberid3').removeClass("incorrectinput");
          }
});
$('#contactemailid3').change(function() {
  if(!emailReg.test($('#contactemailid3').val())){
      $('#contactemailid3').addClass("incorrectinput");
      $('#contactemailid3').removeClass("correctinput");
    }

    else{

      $('#contactemailid3').addClass("correctinput");
        $('#contactemailid3').removeClass("incorrectinput");
    }

    if($('#contactemailid').val()==""){
      $('#contactemailid').addClass("incorrectinput");
      $('#contactemailid').removeClass("correctinput");
    }
});
     $('#contactnameid3').keyup(function() {

        if($('#contactnameid3').val() != '' && $('#contactdesignationid3').val() != '' && $('#contactnumberid3').val() != '' && $('#contactemailid3').val() != '' && emailReg.test($('#contactemailid3').val())) {
          $('#last').prop('disabled', false);
        }
        else{
          $('#last').prop('disabled', true);
        }
     });
     $('#contactdesignationid3').keyup(function() {

        if($('#contactnameid3').val() != '' && $('#contactdesignationid3').val() != '' && $('#contactnumberid3').val() != '' && $('#contactemailid3').val() != '' && emailReg.test($('#contactemailid3').val())) {

          $(':input[type="submit"]').prop('disabled', false);
        }
        else{
          $(':input[type="submit"]').prop('disabled', true);
        }
     });
     $('#contactnumberid3').keyup(function() {

        if($('#contactnameid3').val() != '' && $('#contactdesignationid3').val() != '' && $('#contactnumberid3').val() != '' && $('#contactemailid3').val() != '' && emailReg.test($('#contactemailid3').val())) {

          $(':input[type="submit"]').prop('disabled', false);
        }
        else{
          $(':input[type="submit"]').prop('disabled', true);
        }
     });
     $('#contactemailid3').keyup(function() {

        if($('#contactnameid3').val() != '' && $('#contactdesignationid3').val() != '' && $('#contactnumberid3').val() != '' && $('#contactemailid3').val() != '' && emailReg.test($('#contactemailid3').val())) {

          $(':input[type="submit"]').prop('disabled', false);
        }
        else{
          $(':input[type="submit"]').prop('disabled', true);
        }
     });
    });
    $('#contactnumberid3').on('keydown',function(e){
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
$('#1Online').on('change',function(){
  var checkBox = document.getElementById("1Online");
  if (checkBox.checked == true){
    document.getElementById("1Url").readOnly = false;

  } else {
    document.getElementById("1Url").readOnly = true;
    $('#1Url').val("");
  }
});
$('#2Online').on('change',function(){
  var checkBox = document.getElementById("2Online");
  if (checkBox.checked == true){
    document.getElementById("2Url").readOnly = false;
  } else {
    document.getElementById("2Url").readOnly = true;
    $('#2Url').val("");
  }
});
$('#3Online').on('change',function(){
  var checkBox = document.getElementById("3Online");
  if (checkBox.checked == true){
    document.getElementById("3Url").readOnly = false;
  } else {
    document.getElementById("3Url").readOnly = true;
    $('#3Url').val("");
  }
});
$('#4Online').on('change',function(){
  var checkBox = document.getElementById("4Online");
  if (checkBox.checked == true){
    document.getElementById("4Url").readOnly = false;
  } else {
    document.getElementById("4Url").readOnly = true;
    $('#4Url').val("");
  }
});
$('#5Online').on('change',function(){
  var checkBox = document.getElementById("5Online");
  if (checkBox.checked == true){
    document.getElementById("5Url").readOnly = false;
  } else {
    document.getElementById("5Url").readOnly = true;
    $('#5Url').val("");
  }
});
$('#7Online').on('change',function(){
  var checkBox = document.getElementById("7Online");
  if (checkBox.checked == true){
    document.getElementById("7Url").readOnly = false;
  } else {
    document.getElementById("7Url").readOnly = true;
    $('#7Url').val("");
  }
});
$('#8Online').on('change',function(){
  var checkBox = document.getElementById("8Online");
  if (checkBox.checked == true){
    document.getElementById("8Url").readOnly = false;
  } else {
    document.getElementById("8Url").readOnly = true;
    $('#8Url').val("");
  }
});
$('#9Online').on('change',function(){
  var checkBox = document.getElementById("9Online");
  if (checkBox.checked == true){
    document.getElementById("9Url").readOnly = false;
  } else {
    document.getElementById("9Url").readOnly = true;
    $('#9Url').val("");
  }
});
$('#10Online').on('change',function(){
  var checkBox = document.getElementById("10Online");
  if (checkBox.checked == true){
    document.getElementById("10Url").readOnly = false;
  } else {
    document.getElementById("10Url").readOnly = true;
    $('#10Url').val("");
  }
});
$('#11Online').on('change',function(){
  var checkBox = document.getElementById("11Online");
  if (checkBox.checked == true){
    document.getElementById("11Url").readOnly = false;
  } else {
    document.getElementById("11Url").readOnly = true;
    $('#11Url').val("");
  }
});
$('#OtherFs1Online').on('change',function(){
  var checkBox = document.getElementById("OtherFs1Online");
  if (checkBox.checked == true){
    document.getElementById("otherFs1Url").readOnly = false;
  } else {
    document.getElementById("otherFs1Url").readOnly = true;
    $('#otherFs1Url').val("");
  }
});
$('#OtherFs2Online').on('change',function(){
  var checkBox = document.getElementById("OtherFs2Online");
  if (checkBox.checked == true){
    document.getElementById("otherFs2Url").readOnly = false;
  } else {
    document.getElementById("otherFs2Url").readOnly = true;
    $('#otherFs2Url').val("");
  }
});
$('#OtherFs3Online').on('change',function(){
  var checkBox = document.getElementById("OtherFs3Online");
  if (checkBox.checked == true){
    document.getElementById("otherFs3Url").readOnly = false;
  } else {
    document.getElementById("otherFs3Url").readOnly = true;
    $('#otherFs3Url').val("");
  }
});
$('#Intrenet').on('change',function(){
  var checkBox = document.getElementById("Intrenet");
  if(checkBox.checked == true)
  {
    document.getElementById("LeasedLine").disabled = false;
    document.getElementById("DSL").disabled = false;
    document.getElementById("MobileData").disabled = false;
    document.getElementById("ISDN").disabled = false;
    document.getElementById("Satellite").disabled = false;
  }else{
    document.getElementById("LeasedLine").disabled = true;
    document.getElementById("DSL").disabled = true;
    document.getElementById("MobileData").disabled = true;
    document.getElementById("ISDN").disabled = true;
    document.getElementById("Satellite").disabled = true;
  }
});
JS;
$this->registerJs($script);
?>
