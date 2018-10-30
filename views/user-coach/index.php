<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCoachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Coaches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-coach-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Coach', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Username',
            'AuthKey',
            'Password',
            'PasswordResetToken',
            //'Email:email',
            //'LguProfileId',
            //'Uuid',
            //'IsDeleted',
            //'UserType',
            //'isLogin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
