<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use app\models\LceTerm;
use app\models\EmploymentStatus;
use app\models\EmployeePosition;
use app\models\LguEmployee;
use app\models\LguEmployeeOffice;
use app\models\LguEmployeePosition;
use Mpdf\Mpdf;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
$municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);
$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
$region = Psgcregion::findOne($province->RegionId);
$incomeClass = IncomeClass::find()->all();
$lceTerm = LceTerm::find()->all();
$this->title = $municipalityCity->MunicipalityCityName;

$employmentStatus = EmploymentStatus::find()->all();
$position = EmployeePosition::find()->all();
$countEmploymentStatus = EmploymentStatus::find()->count();
$lguemployeestatus1 = LguEmployee::find()->where(['LguProfileId' => $model->Id,'EmployementStatusId' =>1])->all();
$lguemployeestatus2 = LguEmployee::find()->where(['LguProfileId' => $model->Id,'EmployementStatusId' =>2])->all();
$lguemployeestatus3 = LguEmployee::find()->where(['LguProfileId' => $model->Id,'EmployementStatusId' =>3])->all();
$addStatus1 = $lguemployeestatus1[0]->EmployeeMale + $lguemployeestatus2[0]->EmployeeMale + $lguemployeestatus3[0]->EmployeeMale ;
$addStatus2 = $lguemployeestatus1[0]->EmployeeFemale + $lguemployeestatus2[0]->EmployeeFemale+$lguemployeestatus3[0]->EmployeeFemale;
$lguemployeeoffice = LguEmployeeOffice::find()->all();

$lguemployeeposition = LguEmployeePosition::find()->where(['LguProfileId' => $model->Id])->all();

foreach($lguemployeeposition as $empos){
    // echo"<pre>";
    // print_r($co);
    // echo"</pre>";
    // exit;

$lguemployeepositionid= $empos->EmployeePositionId;
$lguemployeestatusid= $empos->EmployeeStatusId;


switch ($lguemployeepositionid) {
    
    case 1:

        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:605px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:605px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:605px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:605px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
      
    case 2:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:635px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:635px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:635px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:635px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 3:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:670px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:670px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:670px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:670px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 4:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:705px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:705px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:705px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:705px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
        
    case 5:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:740px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:740px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:740px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:740px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
       
     case 6:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:770px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:770px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:770px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:770px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        } 
      
        break;
     case 7:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:800px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:800px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:800px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:800px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 8:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:835px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:835px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:835px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:835px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 9:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:870px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:870px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:870px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:870px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 10:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:905px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:905px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:905px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:905px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
    case 11:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:940px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:940px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:940px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:940px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;
     case 12:
        if ($lguemployeestatusid == 1){
            echo "<p style='position:absolute;top:975px;left:400px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 2){    
            echo "<p style='position:absolute;top:975px;left:510px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 3){
            echo "<p style='position:absolute;top:975px;left:620px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        elseif ($lguemployeestatusid == 4){
            echo "<p style='position:absolute;top:975px;left:710px;width:100px;width:100px;'>".$empos->NoOfEmployee."</p>";
        }
        else {
            echo " ";
        }
        break;

    default:
    echo "<p style='position:absolute;top:425;left:315;'>$model->OtherClass</p>";



    }
}


// echo "<pre>";
// print_r($lguemployeeoffice);
// echo "</pre>";
// exit;
?>

<!-- Total number of employees at your LGU: -->
<p style="position:absolute;top:105px;left:270px;width:100px;"><?= $lguemployeestatus1[0]->EmployeeMale; ?> </p>
<p style="position:absolute;top:140px;left:270px;width:100px;"><?= $lguemployeestatus1[0]->EmployeeFemale; ?> </p>

<p style="position:absolute;top:105px;left:370px;width:100px;"><?= $lguemployeestatus2[0]->EmployeeMale; ?> </p>
<p style="position:absolute;top:140px;left:370px;width:100px;"><?= $lguemployeestatus2[0]->EmployeeFemale; ?> </p>

<p style="position:absolute;top:105px;left:500px;width:100px;"><?= $lguemployeestatus3[0]->EmployeeMale; ?> </p>
<p style="position:absolute;top:140px;left:500px;width:100px;"><?= $lguemployeestatus3[0]->EmployeeFemale; ?> </p>

<p style="position:absolute;top:105px;left:650px;width:100px;"><?= $addStatus1; ?> </p>
<p style="position:absolute;top:140px;left:650px;width:100px;"><?= $addStatus2; ?> </p>

<!-- Number of employees per Office: -->
<p style="position:absolute;top:230px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->ICTOffice ?></p>
<p style="position:absolute;top:270px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->BPLOffice ?></p>
<p style="position:absolute;top:300px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->TreasurtOffice ?></p>
<p style="position:absolute;top:335px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->OBOffice ?></p>
<p style="position:absolute;top:367px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->HealthOffice ?></p>
<p style="position:absolute;top:400px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->PDOffice ?></p>
<p style="position:absolute;top:435px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->ZonningOffice ?></p>
<p style="position:absolute;top:465px;left:125px;width:200px;"><?= $lguemployeeoffice[0]->EngineeringOffice ?></p>



















