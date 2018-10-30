<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguOsAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Os Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-os-admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Os Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'OSWorkstation',
            'OSServer',
            'CBMS',
            //'HRMIS',
            //'LGPMS',
            //'PayrollSystem',
            //'PIS',
            //'ProcurementSystem',
            //'ProjectMonitoringSystem',
            //'RecordsManagementSystem',
            //'DocumentTrackingSystem',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
