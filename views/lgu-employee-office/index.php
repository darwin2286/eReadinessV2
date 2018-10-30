<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguEmployeeOfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Employee Offices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-office-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Employee Office', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'ICTOffice',
            'BPLOffice',
            'TreasurtOffice',
            //'OBOffice',
            //'HealthOffice',
            //'PDOffice',
            //'ZonningOffice',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
