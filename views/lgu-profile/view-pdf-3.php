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
use Mpdf\Mpdf;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
$municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);
$contactperson = Contactperson::find()->where(['LguProfileId' => $model->Id,'PartNo'=>2])->all();
$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
$region = Psgcregion::findOne($province->RegionId);
$incomeClass = IncomeClass::find()->all();
$lceTerm = LceTerm::find()->all();
$course = LguEmployeeCourse::find()->where(['LguProfileId' => $model->Id])->all();
$this->title = $municipalityCity->MunicipalityCityName;
// echo"<pre>";
// print_r($course);
// echo"</pre>";
//echo count($course);
$i=1;

foreach($course as $co){
$courseid= $co->CourseId;
switch ($courseid) {
    case 1:
        echo "<p style='position:absolute;top:100px;left:420px;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 2:
        echo "<p style='position:absolute;top:135;left:420px;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 3:
        echo "<p style='position:absolute;top:170;left:420;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 4:
        echo "<p style='position:absolute;top:205;left:420;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 5:
        echo "<p style='position:absolute;top:240;left:420;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 6: //.Net
        echo "<p style='position:absolute;top:275;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
        echo "<p style='position:absolute;top:275;left:520;width:100px;'>✔</p>";
        break;
    case 7: //Vb
    echo "<p style='position:absolute;top:293px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:293px;left:520;width:100px;'>✔</p>";
        break;
    case 8:
    echo "<p style='position:absolute;top:310px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:310px;left:520;width:100px;'>✔</p>";
        break;
    case 9:
    echo "<p style='position:absolute;top:326;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:326;left:520;width:100px;'>✔</p>";
        break;
    case 10: //html
    echo "<p style='position:absolute;top:344px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:344px;left:520;width:100px;'>✔</p>";
        break;
    case 11:
    echo "<p style='position:absolute;top:358;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:358;left:520;width:100px;'>✔</p>";
        break;
    case 12:
    echo "<p style='position:absolute;top:374;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:374;left:520;width:100px;'>✔</p>";
        break;
    case 13: //python
    echo "<p style='position:absolute;top:394px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:394px;left:520;width:100px;'>✔</p>";
        break;
    case 14:
    echo "<p style='position:absolute;top:411px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:411px;left:520;width:100px;'>✔</p>";
        break;
    case 15:
    echo "<p style='position:absolute;top:427px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:427px;left:520;width:100px;'>✔</p>";
        break;
    case 16:
    echo "<p style='position:absolute;top:444px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:444px;left:520;width:100px;'>✔</p>";
        break;
    case 17:
    echo "<p style='position:absolute;top:528px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:528px;left:520;width:100px;'>✔</p>";
        break;
    case 18:
    echo "<p style='position:absolute;top:545px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:545px;left:520;width:100px;'>✔</p>";
        break;
    case 19:
    echo "<p style='position:absolute;top:564px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:564px;left:520;width:100px;'>✔</p>";
        break;
    case 20:
    echo "<p style='position:absolute;top:580px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:580px;left:520;width:100px;'>✔</p>";
        break;
    case 21:
    echo "<p style='position:absolute;top:595px;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:595px;left:520;width:100px;'>✔</p>";
        break;
    case 22:
    echo "<p style='position:absolute;top:626;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:626;left:580;width:100px;'>".$co->OtherNoSql."</p>";
    echo "<p style='position:absolute;top:621;left:520;width:100px;'>✔</p>";
        break;
    case 23:
        echo "<p style='position:absolute;top:396;left:145px;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 24:
        echo "<p style='position:absolute;top:411;left:145px;width:100px;'>".$co->NoOfEmployee."</p>";
        break;
    case 25:
    echo "<p style='position:absolute;top:461;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:461;left:520;width:100px;'>✔</p>";
    echo "<p style='position:absolute;top:461;left:600;width:100px;'>".$co->OtherProgramming."</p>";
        break;
    case 26:
    echo "<p style='position:absolute;top:659;left:400;width:100px;'>".$co->NoOfEmployee."</p>";
    echo "<p style='position:absolute;top:654;left:520;width:100px;'>✔</p>";
        break;

    default:
        echo "<p style='position:absolute;top:426;left:315;width:100px;'>$model->OtherClass</p>";
}

}

?>

<div style="width:180px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:745;left:220px;"><p ><?= $contactperson[0]->ConatactName; ?></p></div>
<div style="width:180px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:745;left:535px;"><p style=""><?= $contactperson[0]->ContactEmail; ?></p></div>
<div style="width:180px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:790;left:220px;"><p><?= $contactperson[0]->ContactDesignation; ?></p></div>
<div style="width:180px;height:40px;font-size:8px;font-size:200vw;position:absolute;top:790;left:535px;"><p><?= $contactperson[0]->ContactNo; ?></p></div>
