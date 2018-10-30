<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguSecuritySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Securities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-security-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Security', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'ProtectionScheme',
            'SecurityPolicy',
            'DisasterRecoveryPlan',
            //'DigitalSecurity',
            //'Encryption',
            //'UPS',
            //'HardwareFirewall',
            //'SoftwareFirewall',
            //'SubSecuritySoft',
            //'EmailAuth:email',
            //'OffsiteBackup',
            //'SecuredServer',
            //'Storagebackup',
            //'ISSP',
            //'ISSPDesc',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
