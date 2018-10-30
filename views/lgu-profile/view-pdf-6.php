<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use app\models\LceTerm;
use app\models\ContactPerson;
use app\models\LguSecurity;
use app\models\LguNetwork;
use app\models\LguCloud;
use app\models\LguOsAdmin;
use app\models\LguOsOther;

use Mpdf\Mpdf;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
$municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);
$contactperson = Contactperson::find()->where(['LguProfileId' => $model->Id,'PartNo'=>3])->all();
$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
$region = Psgcregion::findOne($province->RegionId);
$incomeClass = IncomeClass::find()->all();
$lceTerm = LceTerm::find()->all();
$security = LguSecurity::find()->where(['LguProfileId' => $model->Id])->all();
$network = LguNetwork::find()->where(['LguProfileId' => $model->Id])->all();
$lguosadmin = LguOsAdmin::find()->where(['LguProfileId' => $model->Id])->all();
$lguosother = LguOsOther::find()->where(['LguOsAdminid' => $lguosadmin[0]->Id])->all();
//$lguosadmin = LguOsAdmin::findOne($model->Id);
$cloud = LguCloud::findOne(['LguProfileId' => $model->Id]);
$this->title = $municipalityCity->MunicipalityCityName;
// echo"<pre>";

// echo $lguosadmin[0]->CBMS;
// echo"</pre>";
// exit;
// echo count($course);

if(isset($lguosadmin[0]->CBMS))
{
    echo"<p style='position:absolute;left:142px;top:54px;'>✔</p>";
}
if(isset($lguosadmin[0]->HRMIS))
{
    echo"<p style='position:absolute;left:142px;top:72px;'>✔</p>";
}
if(isset($lguosadmin[0]->LGPMS))
{
    echo"<p style='position:absolute;left:142px;top:90px;'>✔</p>";
}
if(isset($lguosadmin[0]->PayrollSystem))
{
    echo"<p style='position:absolute;left:142px;top:106px;'>✔</p>";
}
if(isset($lguosadmin[0]->PIS))
{
    echo"<p style='position:absolute;left:142px;top:126px;'>✔</p>";
}
if(isset($lguosadmin[0]->ProcurementSystem))
{
    echo"<p style='position:absolute;left:142px;top:144px;'>✔</p>";
}
if(isset($lguosadmin[0]->ProjectMonitoringSystem))
{
    echo"<p style='position:absolute;left:142px;top:162px;'>✔</p>";
}
if(isset($lguosadmin[0]->RecordsManagementSystem))
{
    echo"<p style='position:absolute;left:142px;top:178px;'>✔</p>";
}
if(isset($lguosadmin[0]->DocumentTrackingSystem))
{
    echo"<p style='position:absolute;left:142px;top:196px;'>✔</p>";
}
if(isset($lguosother[0]->OtherName))
{
    echo"<p style='position:absolute;left:130px;top:263px;width:450px;'>".$lguosother[0]->OtherName."</p>";
}



if(isset($network[0]->Intranet))
{
    echo"<p style='position:absolute;left:118px;top:373px;'>✔</p>";
}
if(isset($network[0]->LAN))
{
    echo"<p style='position:absolute;left:161px;top:390px;'>✔</p>";
}
if(isset($network[0]->WAN))
{
    echo"<p style='position:absolute;left:161px;top:408px;'>✔</p>";
}
if(isset($network[0]->VPN))
{
    echo"<p style='position:absolute;left:161px;top:426px;'>✔</p>";
}
if(isset($network[0]->Intrenet))
{
    echo"<p style='position:absolute;left:118px;top:442px;'>✔</p>";
}
if(isset($network[0]->LeasedLine))
{
    echo"<p style='position:absolute;left:158px;top:475px;'>✔</p>";
}
if(isset($network[0]->DSL))
{
    echo"<p style='position:absolute;left:158px;top:492px;'>✔</p>";
}
if(isset($network[0]->MobileData))
{
    echo"<p style='position:absolute;left:158px;top:509px;'>✔</p>";
}
if(isset($network[0]->ISDN))
{
    echo"<p style='position:absolute;left:158px;top:526px;'>✔</p>";
}
if(isset($network[0]->Satellite))
{
    echo"<p style='position:absolute;left:158px;top:543px;'>✔</p>";
}
if(isset($network[0]->ISP))
{
    echo"<p style='position:absolute;left:118px;top:560px;'>✔</p>";
}
if(isset($network[0]->ISPProvider1))
{
    echo"<p style='position:absolute;left:370px;top:577;width:300px'>".$network[0]->ISPProvider1."</p>";
}
if(isset($network[0]->Bandwidth1))
{
    echo"<p style='position:absolute;left:510px;top:602px;width:100px;'>".$network[0]->Bandwidth1."</p>";
}
if(isset($network[0]->ISPProvider2))
{
    echo"<p style='position:absolute;left:370px;top:635px;width:300px'>".$network[0]->ISPProvider2."</p>";
}
if(isset($network[0]->Bandwidth2))
{
    echo"<p style='position:absolute;left:510px;top:660px;width:100px;'>".$network[0]->Bandwidth2."</p>";
}
if(isset($network[0]->NoEmployeeInternet))
{
    echo"<p style='position:absolute;left:430px;top:682px;width:100px;'>".$network[0]->NoEmployeeInternet."</p>";
}
if(isset($network[0]->NoEmployeeEmail))
{
    echo"<p style='position:absolute;left:430px;top:702px;width:100px;'>".$network[0]->NoEmployeeInternet."</p>";
}
if($security[0]->ProtectionScheme == 1){
    echo"<p style='position:absolute;left:137px;top:762px;'>✔</p>";
    if($security[0]->SecurityPolicy){
        echo"<p style='position:absolute;left:137px;top:829px;'>✔</p>";
    }
    if($security[0]->DisasterRecoveryPlan){
        echo"<p style='position:absolute;left:137px;top:846px;'>✔</p>";
    }
    if($security[0]->DigitalSecurity){
        echo"<p style='position:absolute;left:137px;top:863px;'>✔</p>";
    }
    if($security[0]->Encryption){
        echo"<p style='position:absolute;left:137px;top:880px;'>✔</p>";
    }
    if($security[0]->UPS){
        echo"<p style='position:absolute;left:137px;top:897px;'>✔</p>";
    }
    if($security[0]->HardwareFirewall){
        echo"<p style='position:absolute;left:137px;top:914px;'>✔</p>";
    }
    if($security[0]->SoftwareFirewall){
        echo"<p style='position:absolute;left:137px;top:931px;'>✔</p>";
    }
    if($security[0]->SubSecuritySoft){
        echo"<p style='position:absolute;left:137px;top:948px;'>✔</p>";
    }
    if($security[0]->EmailAuth){
        echo"<p style='position:absolute;left:137px;top:965px;'>✔</p>";
    }
    if($security[0]->OffsiteBackup){
        echo"<p style='position:absolute;left:137px;top:982px;'>✔</p>";
    }
    if($security[0]->SecuredServer){
        echo"<p style='position:absolute;left:137px;top:999px;'>✔</p>";
    }
    if($security[0]->Storagebackup){
        echo"<p style='position:absolute;left:137px;top:1016px;'>✔</p>";
    }
}
else{
    echo"<p style='position:absolute;left:137px;top:779px;'>✔</p>";
}
?>