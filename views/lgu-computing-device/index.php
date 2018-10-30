<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguComputingDeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Computing Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-computing-device-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Computing Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'DesctopComputer',
            'Laptop',
            'ApplicationServer',
            //'WebServer',
            //'DBServer',
            //'FileServer',
            //'MailServer',
            //'Tablets',
            //'SmartPhones',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
