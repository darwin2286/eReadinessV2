<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguFrontlineServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LGU Frontline Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-frontline-service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
      'enablePushState' => false
    ]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Frontline Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'FrontlineServiceId',
            'OnPremise',
            'Online',
            //'ePayment',
            //'OnlineUrl',
            //'Uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
