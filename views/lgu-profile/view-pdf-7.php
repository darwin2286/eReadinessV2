<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use app\models\LceTerm;
use app\models\ContactPerson;
use app\models\LguEmployeeCourse;
use app\models\LguSecurity;
use app\models\LguCloud;
use Mpdf\Mpdf;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
$municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);
$contactperson = Contactperson::find()->where(['LguProfileId' => $model->Id,'PartNo'=>3])->all();
$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
$region = Psgcregion::findOne($province->RegionId);
$incomeClass = IncomeClass::find()->all();
$lceTerm = LceTerm::find()->all();
$course = LguEmployeeCourse::find()->where(['LguProfileId' => $model->Id])->all();
$security = LguSecurity::find()->where(['LguProfileId' => $model->Id])->all();

$cloud = LguCloud::findOne(['LguProfileId' => $model->Id]);
$this->title = $municipalityCity->MunicipalityCityName;
// echo"<pre>";

// print_r($security);
// echo"</pre>";
// exit;
//echo count($course)
if($security[0]->ISSP==1){
echo   "<p style='position:absolute;top:37;left:138;width:200px;'>✔</p>";
}
else{
    echo   "<p style='position:absolute;top:54;left:138;width:200px;'>✔</p>";
}
$date = date('F d, Y', strtotime( $security[0]->ISSPDesc));
//echo"<pre>";print_r($cloud);echo"</pre>";exit;
?>

<p style="position:absolute;top:27;left:220px;width:100px;"><?= $security[0]->ISSP; ?></p>
<p style="position:absolute;top:36;left:510px;;width:200px;font-size: 13px;"><?= $date; ?></p>
<div style="width:200px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:474;left:185px;"><p ><?= $contactperson[0]->ConatactName; ?></p></div>
<div style="width:200px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:474;left:510px;"><p style=""><?= $contactperson[0]->ContactEmail; ?></p></div>
<div style="width:200px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:515;left:185px;"><p><?= $contactperson[0]->ContactDesignation; ?></p></div>
<div style="width:200px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:515;left:510px;"><p><?= $contactperson[0]->ContactNo; ?></p></div>
<div style="position:absolute;top:129;left:205px;width:350px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1?></p></div>
<div style="position:absolute;top:168;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service1?></p></div>
<div style="position:absolute;top:187;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service2?></p></div>
<div style="position:absolute;top:205;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service3?></p></div>
<div style="position:absolute;top:168;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service4?></p></div>
<div style="position:absolute;top:187;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service5?></p></div>
<div style="position:absolute;top:205;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider1Service6?></p></div>

<div style="position:absolute;top:242;left:205px;width:350px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2?></p></div>

<div style="position:absolute;top:278;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service1?></p></div>
<div style="position:absolute;top:298;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service2?></p></div>
<div style="position:absolute;top:316;left:180px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service3?></p></div>
<div style="position:absolute;top:278;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service4?></p></div>
<div style="position:absolute;top:298;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service5?></p></div>
<div style="position:absolute;top:316;left:420px;width:180px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->Provider2Service6?></p></div>

<div style="position:absolute;top:388;left:94px;width:350px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->WebHost1?></p></div>
<div style="position:absolute;top:408;left:94px;width:350px;height:30px;font-size:13px;font-size:13vw;align:right;"><p><?= $cloud->WebHost2?></p></div>