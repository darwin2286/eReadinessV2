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
use app\models\LguOsAdmin;
use app\models\LguFrontlineService;
use app\models\LguFrontlineServiceOther;
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
$frontline = LguFrontlineService::find()->where(['LguProfileId' => $model->Id])->all();
$os = LguOsAdmin::findOne(['LguProfileId' => $model->Id]);

$oss = explode(",", $os->OSWorkstation);
$osserver = explode(",", $os->OSServer);
$frontlineother = LguFrontlineServiceOther::find()->where(['LguProfileId' => $model->Id])->all();
foreach ($oss as $x) {
    switch ($x) {
        case 1:
            echo "<p style='position:absolute;left:135px;top:105px;'>✔</p>";
            break;
        case 2:
            echo "<p style='position:absolute;left:135px;top:122px;'>✔</p>";
            break;
        case 3:
            echo "<p style='position:absolute;left:135px;top:139px;'>✔</p>";
            break;
        case 4:
            echo "<p style='position:absolute;left:135px;top:156px;'>✔</p>";
            break;
        case 5:
            echo "<p style='position:absolute;left:135px;top:173px;'>✔</p>";
            break;
        case 6:
            echo "<p style='position:absolute;left:368px;top:105px;'>✔</p>";
            break;
        case 7:
            echo "<p style='position:absolute;left:368px;top:122px;'>✔</p>";
            break;
        case 8:
            echo "<p style='position:absolute;left:368px;top:139px;'>✔</p>";
            break;
        case 9:
            echo "<p style='position:absolute;left:368px;top:156px;'>✔</p>";    
            break;
        case 10:
            echo "<p style='position:absolute;left:570px;top:105px;'>✔</p>";    
            break;
        case 11:
            echo "<p style='position:absolute;left:570px;top:122px;'>✔</p>";    
            break;
        case 12:
            echo "<p style='position:absolute;left:570px;top:139px;'>✔</p>";    
            break;
        case 13:
            echo "<p style='position:absolute;left:570px;top:156px;'>✔</p>";    
            break;
        
        default:
            
            break;
    }

}
foreach ($osserver as $x) {
    switch ($x) {
        case 14:
            echo "<p style='position:absolute;left:135px;top:239px;'>✔</p>";
            break;
        case 15:
            echo "<p style='position:absolute;left:135px;top:256px;'>✔</p>";
            break;
        case 16:
            echo "<p style='position:absolute;left:135px;top:273px;'>✔</p>";
            break;
        case 17:
            echo "<p style='position:absolute;left:135px;top:292px;'>✔</p>";
            break;
        case 18:
            echo "<p style='position:absolute;left:135px;top:309px;'>✔</p>";
            break;
        case 19:
            echo "<p style='position:absolute;left:135px;top:326px;'>✔</p>";
            break;
        case 20:
            echo "<p style='position:absolute;left:368px;top:239px;'>✔</p>";
            break;
        case 21:
            echo "<p style='position:absolute;left:368px;top:256px;'>✔</p>";
            break;
        case 22:
            echo "<p style='position:absolute;left:368px;top:273px;'>✔</p>";    
            break;
        case 23:
            echo "<p style='position:absolute;left:368px;top:292px;'>✔</p>";    
            break;
        case 24:
            echo "<p style='position:absolute;left:368px;top:309px;'>✔</p>";    
            break;
        case 25:
            echo "<p style='position:absolute;left:368px;top:326px;'>✔</p>";    
            break;
        case 26:
            echo "<p style='position:absolute;left:570px;top:239px;'>✔</p>";    
            break;
        case 27:
            echo "<p style='position:absolute;left:570px;top:256px;'>✔</p>";    
            break;
        case 28:
            echo "<p style='position:absolute;left:570px;top:272px;'>✔</p>";    
            break;
        case 29:
            echo "<p style='position:absolute;left:570px;top:292px;'>✔</p>";    
            break;
        case 30:
            echo "<p style='position:absolute;left:570px;top:309px;'>✔</p>";    
            break;
        default:
            
            break;
    }

}
foreach ($frontline as $x) {
    switch ($x->FrontlineServiceId) {
        case 1:
            if ($x->OnPremise ==1) {
                echo "<p style='position:absolute;left:418px;top:445px;'>✔</p>";
            }
            if ($x->Online ==1) {
                echo "<p style='position:absolute;left:483px;top:445px;'>✔</p>";
                echo "<p style='position:absolute;left:600px;top:445px;'>".$x->OnlineUrl."</p>";

            }
            if ($x->ePayment ==1) {
                echo "<p style='position:absolute;left:548px;top:445px;'>✔</p>";
            }
        
            break;
        case 2:
        if ($x->OnPremise ==1) {
            echo "<p style='position:absolute;left:418px;top:478px;'>✔</p>";
        }
        if ($x->Online ==1) {
            echo "<p style='position:absolute;left:483px;top:478px;'>✔</p>";
            echo "<p style='position:absolute;left:600px;top:478px;'>".$x->OnlineUrl."</p>";

        }
        if ($x->ePayment ==1) {
            echo "<p style='position:absolute;left:548px;top:478px;'>✔</p>";
        }
            break;
        case 3:
        if ($x->OnPremise ==1) {
            echo "<p style='position:absolute;left:418px;top:513px;'>✔</p>";
        }
        if ($x->Online ==1) {
            echo "<p style='position:absolute;left:483px;top:513px;'>✔</p>";
            echo "<p style='position:absolute;left:600px;top:513px;'>".$x->OnlineUrl."</p>";

        }
        if ($x->ePayment ==1) {
            echo "<p style='position:absolute;left:548px;top:513px;'>✔</p>";
        }
            break;
        case 4:
        if ($x->OnPremise ==1) {
            echo "<p style='position:absolute;left:418px;top:545px;'>✔</p>";
        }
        if ($x->Online ==1) {
            echo "<p style='position:absolute;left:483px;top:545px;'>✔</p>";
            echo "<p style='position:absolute;left:600px;top:545px;'>".$x->OnlineUrl."</p>";

        }
        if ($x->ePayment ==1) {
            echo "<p style='position:absolute;left:548px;top:545px;'>✔</p>";
        }
            break;
        case 5:
        if ($x->OnPremise ==1) {
            echo "<p style='position:absolute;left:418px;top:577px;'>✔</p>";
        }
        if ($x->Online ==1) {
            echo "<p style='position:absolute;left:483px;top:577px;'>✔</p>";
            echo "<p style='position:absolute;left:600px;top:577px;'>".$x->OnlineUrl."</p>";

        }
        if ($x->ePayment ==1) {
            echo "<p style='position:absolute;left:548px;top:577px;'>✔</p>";
        }
            break;
        case 6:
        if ($x->OnPremise ==1) {
            echo "<p style='position:absolute;left:418px;top:650px;'>✔</p>";
        }
        if ($x->Online ==1) {
            echo "<p style='position:absolute;left:483px;top:650px;'>✔</p>";
            echo "<p style='position:absolute;left:600px;top:650px;'>".$x->OnlineUrl."</p>";

        }
        if ($x->ePayment ==1) {
            echo "<p style='position:absolute;left:548px;top:650px;'>✔</p>";
        }
        case 7:
        if ($x->ePayment ==1 || $x->Online ==1 || $x->OnPremise ==1) {
            echo "<p style='position:absolute;left:137px;top:698px;'>✔</p>";
        }
        
            break;
        case 8:
        if ($x->ePayment ==1 || $x->Online ==1 || $x->OnPremise ==1) {
            echo "<p style='position:absolute;left:137px;top:716px;'>✔</p>";
        }
            break;
        case 9:
        if ($x->ePayment ==1 || $x->Online ==1 || $x->OnPremise ==1) {
            echo "<p style='position:absolute;left:137px;top:734px;'>✔</p>";
        }
            break;
        case 10:
        if ($x->ePayment ==1 || $x->Online ==1 || $x->OnPremise ==1) {
            echo "<p style='position:absolute;left:137px;top:750px;'>✔</p>";
        }
            break;
         
        
        
        default:
        if ($x->ePayment ==1 || $x->Online ==1 || $x->OnPremise ==1) {
            echo "<p style='position:absolute;left:137px;top:768px;'>✔</p>";
        }
            break;
    }
}
$x=833;
// echo "<pre>";
// print_r($frontlineother);
// echo"</pre>";
// exit;
foreach ($frontlineother as $frontonther) {
    echo"<p style='position:absolute;left:150px;top:".$x."px;width:450px;'>".$frontonther->OtherName."</p>";
    $x=$x+20;
}
   

// echo"<pre>";

// print_r($oss);
// echo"</pre>";
// exit;