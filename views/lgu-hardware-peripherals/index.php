<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguHardwarePeripheralsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Hardware Peripherals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-hardware-peripherals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Hardware Peripherals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'MultiPrinter',
            'Printer',
            'DocScanner',
            //'UPS',
            //'GenSet',
            //'Biometric',
            //'AccessCard',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
