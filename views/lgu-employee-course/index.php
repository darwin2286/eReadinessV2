<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguEmployeeCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lgu Employee Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lgu Employee Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'LguProfileId',
            'CourseId',
            'NoOfEmployee',
            'OtherProgramming',
            //'OtherNoSql',
            //'OtherDatabase',
            //'Uuid',
            //'checkSubCourse',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
