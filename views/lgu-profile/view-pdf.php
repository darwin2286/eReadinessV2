<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Psgcmunicipalitycity;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\IncomeClass;
use app\models\LceTerm;
use app\models\ContactPerson;
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



?>


    

   <div style="width:150px;height:35px;font-size:8px;font-size:200vw;position:absolute;top:187px;left:145px;"><p ><?= $municipalityCity->MunicipalityCityName ?></p></div>
   <p style="position:absolute;top:210px;left:145px;"><?= $province->ProvinceName ?></p>
   <p style="position:absolute;top:233px;left:145px;"><?= $region->RegionName ?></p>
   <?php
   //echo $municipalityCity->Level;
   if($municipalityCity->Level==1){
    echo"<p style='position:absolute;top:300px;left:145px;'>✔</p>";
    }
    else{
    echo"<p style='position:absolute;top:275px;left:145px;'>✔</p>";

    }


   ?>

<?php
$Income = $model->IncomeClassId;

switch ($Income) {
    case 1:
        echo "<p style='position:absolute;top:375;left:145px;'>✔</p>";
        break;
    case 2:
        echo "<p style='position:absolute;top:400;left:145px;'>✔</p>";
        break;
    case 3:
        echo "<p style='position:absolute;top:415;left:145px;'>✔</p>";
        break;
    case 4:
        echo "<p style='position:absolute;top:430;left:145px;'>✔</p>";
        break;
    case 5:
        echo "<p style='position:absolute;top:375;left:283px;'>✔</p>";
        break;
    case 6:
        echo "<p style='position:absolute;top:400;left:283px;'>✔</p>";
        break; 
    case 6:
        echo "<p style='position:absolute;top:415;left:283px;'>✔</p>";
        break;    
    default:
        echo "<p style='position:absolute;top:445;left:315;width:47px;text-align:center'>$model->OtherClass</p>";
}
?>
<p style="position:absolute;top:480;left:220;width:200px;"><?= $model->NoBarangay?></p>
<p style="position:absolute;top:504;left:150;width:200px;"><?= $model->lgu_website?></p>
<?php 
$total_new = $model->new_business_corporation + $model->new_business_cooperative +$model->new_business_partnership+$model->new_business_signle;
?>
<p style="position:absolute;top:212px;left:500px;width:200px;"><?= $model->new_business_corporation ?></p>
<p style="position:absolute;top:235px;left:500px;width:200px;"><?= $model->new_business_cooperative ?></p>
<p style="position:absolute;top:258px;left:500px;width:200px;"><?= $model->new_business_partnership ?></p>
<p style="position:absolute;top:282px;left:500px;width:200px;"><?= $model->new_business_signle ?></p>
<p style="position:absolute;top:307px;left:500px;width:200px;"><?= $total_new ?></p>
<?php 
$total_renew = $model->renew_business_corporation + $model->renew_business_cooperative +$model->renew_business_partnership+$model->renew_business_single;
$total_new_renew = $total_new+$total_renew;
?>
<p style="position:absolute;top:355;left:500px;width:200px;"><?= $model->renew_business_corporation ?></p>
<p style="position:absolute;top:377px;left:500px;width:200px;"><?= $model->renew_business_cooperative ?></p>
<p style="position:absolute;top:400px;left:500px;width:200px;"><?= $model->renew_business_partnership ?></p>
<p style="position:absolute;top:425px;left:500px;width:200px;"><?= $model->renew_business_single ?></p>
<p style="position:absolute;top:448px;left:500px;width:200px;"><?= $total_renew ?></p>
<p style="position:absolute;top:505px;left:580px;width:200px;"><?= $total_new_renew ?></p>

<p style="position:absolute;top:578px;left:170px;width:1000px;"><?=  $model->lce_name ?></p>

<?php
$term = $model->LceTermId;

switch ($term) {
    case 1:
        echo "<p style='position:absolute;top:623;left:202px;'>✔</p>";
        break;
    case 2:
        echo "<p style='position:absolute;top:623;left:342px;'>✔</p>";
        break;
    case 3:
        echo "<p style='position:absolute;top:623;left:495px;'>✔</p>";
        break;   
    default:
        
}
?>
<?php

$date = date('F d, Y', strtotime($model->EffectivityDateLRC));?>
<p style="position:absolute;top:825;left:250px;width:200px;"><?=  $date ?></p>


<p style="position:absolute;top:900;left:185px;width:200px;"><?= $contactperson[0]->ConatactName; ?></p>
<p style="position:absolute;top:900;left:535px;width:200px;font-size: 12px;"><?= $contactperson[0]->ContactEmail; ?></p>
<p style="position:absolute;top:940;left:185px;width:200px;"><?= $contactperson[0]->ContactDesignation; ?></p>
<p style="position:absolute;top:940;left:535px;width:200px;"><?= $contactperson[0]->ContactNo; ?></p>