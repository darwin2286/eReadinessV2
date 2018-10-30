<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguCloudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Clouds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-cloud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Cloud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'Provider1',
            'ContractValidity1',
            'Provider1Service1',
            //'Provider1Service2',
            //'Provider1Service3',
            //'Provider1Service4',
            //'Provider1Service5',
            //'Provider1Service6',
            //'Provider2',
            //'ContractValidity2',
            //'Provider2Service1',
            //'Provider2Service2',
            //'Provider2Service3',
            //'Provider2Service4',
            //'Provider2Service5',
            //'Provider2Service6',
            //'WebHost1',
            //'WebHost2',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
