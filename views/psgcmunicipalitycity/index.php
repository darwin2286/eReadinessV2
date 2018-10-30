<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PsgcmunicipalitycitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Psgcmunicipalitycities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psgcmunicipalitycity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Psgcmunicipalitycity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'ProvinceId',
            'PsgCodeMunicipalityCity',
            'MunicipalityCityName',
            'Level',
            //'Status',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
 