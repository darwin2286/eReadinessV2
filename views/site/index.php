<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use app\models\Psgcprovince;
	use app\models\Psgcregion;

	/* @var $this yii\web\View */

	$this->title = 'eReadiness Survey 2018';
?>
<?php
	$province = Psgcprovince::findOne($municipalityCity->ProvinceId);
	$region = Psgcregion::findOne($province->RegionId);
		if($municipalityCity['Level'] == 1)
			$cityMun = "City of ".$municipalityCity['MunicipalityCityName'];
		else
			$cityMun = "Municipality of ".$municipalityCity['MunicipalityCityName'];	
?>
<div class="container-fluid" hidden>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-10">
			<table class="table table-striped">
				<tr>
					<td>
						<h2 class="header-no-margin" style="margin-bottom:8px !important;"> <?=$cityMun;?> </h2>
					</td>
				</tr>
				<tr>
					<td>
						<h3 class="header-no-margin" style="margin-bottom:8px !important;"> <?=$province['ProvinceName'];?> </h3>
					</td>
				</tr>
				<tr>
					<td>
						<h3 class="header-no-margin"> <?=$region['RegionName'];?> </h3>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?=$this->render('_surveysteps.php', [
	'step' => $step,
	'id'=>$id,
	'isFinalized'=>$model['isFinalized'],
	'model' => $model,
	'municipalityCity'=>$municipalityCity,
	'modelContactPartOne'=>$modelContactPartOne,
	'modelContactParttwo'=>$modelContactParttwo,
	'modelContactPartthree'=>$modelContactPartthree,
	'modelProfile'=>$modelProfile,
	'modelLguEmployee'=>$modelLguEmployee,
	'modelLguCourse'=>$modelLguCourse,
	'modelLguOffice'=>$modelLguOffice,
	'modelLguPosition'=>$modelLguPosition,
	'modelCloud'=>$modelCloud,
	'modelSecurity'=>$modelSecurity,
	'modelNetwork'=>$modelNetwork,
	'modelFrontline'=>$modelFrontline,
	'modelOs'=>$modelOs,
	'modelLguServer'=>$modelLguServer,
	'modelComputingDevice'=>$modelComputingDevice,
	'modelHardwarePeripherals'=>$modelHardwarePeripherals,
])?>

 
</div>