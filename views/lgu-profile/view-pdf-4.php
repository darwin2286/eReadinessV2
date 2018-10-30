<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use app\models\LceTerm;
use app\models\ContactPerson;
use app\models\LguComputingDevice;
use app\models\LguHardwarePeripherals;
use app\models\LguServer;
use Mpdf\Mpdf;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
$municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);
$contactperson = Contactperson::find()->where(['LguProfileId' => $model->Id,'PartNo'=>1])->all();
$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
$region = Psgcregion::findOne($province->RegionId);
$incomeClass = IncomeClass::find()->all();
$lceTerm = LceTerm::find()->all();
$this->title = $municipalityCity->MunicipalityCityName;

$lgucomputingdevice = LguComputingDevice::find()->all();
$lguhardwareperipherals = LguHardwarePeripherals::find()->all();
// $lguserver = LguServer::find()->all();
$lguserver = LguServer::find()->where(['LguProfileId' => $model->Id])->all();
$totalServers= $lgucomputingdevice[0]->ApplicationServer + $lgucomputingdevice[0]->WebServer + $lgucomputingdevice[0]->DBServer + $lgucomputingdevice[0]->FileServer + $lgucomputingdevice[0]->MailServer;

// echo"<pre>";
// print_r($lguhardwareperipherals);
// echo"</pre>";
// exit;
$x = 870;
foreach($lguserver as $co){
    
    echo "<p style='position:absolute;top:".+$x."px;left:110px;width:100px;'>" . $lguserver[0]->CapicityStorage . " </p>";
    echo "<p style='position:absolute;top:".+$x."px;left:420px;width:100px;'>" . $lguserver[0]->InHouse . " </p>";
    echo "<p style='position:absolute;top:".+$x."px;left:540px;width:100px;'>" . $lguserver[0]->CoLocated . " </p>";
    $x = $x+30;
}

?>


<p style="position:absolute;top:135px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->DesktopComputer; ?> </p>
<p style="position:absolute;top:165px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->Laptop; ?> </p>

<p style="position:absolute;top:200px;left:530px;width:100px;"><?= $totalServers; ?> </p>
<p style="position:absolute;top:230px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->ApplicationServer; ?> </p>
<p style="position:absolute;top:262px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->WebServer; ?> </p>
<p style="position:absolute;top:300px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->DBServer; ?> </p>
<p style="position:absolute;top:330px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->FileServer; ?> </p>
<p style="position:absolute;top:362px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->MailServer; ?> </p>

<p style="position:absolute;top:400px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->Tablets; ?> </p>
<p style="position:absolute;top:430px;left:530px;width:100px;"><?= $lgucomputingdevice[0]->SmartPhones; ?> </p>

<p style="position:absolute;top:530px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->MultiPrinter; ?> </p>
<p style="position:absolute;top:565px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->Printer; ?> </p>
<p style="position:absolute;top:600px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->DocScanner; ?> </p>
<p style="position:absolute;top:628px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->UPS; ?> </p>
<p style="position:absolute;top:661px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->GenSet; ?> </p>
<p style="position:absolute;top:694px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->Biometric; ?> </p>
<p style="position:absolute;top:728px;left:530px;width:100px;"><?= $lguhardwareperipherals[0]->AccessCard; ?> </p>





