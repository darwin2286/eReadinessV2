<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveyContactPersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Survey Contact People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-contact-person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Survey Contact Person', ['/survey-contact-person/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            'full_name',
            'agency',
            'email_address:email',
            'contact_number',
            'designation',
            [
                'attribute'=>'status',
                'value'=>function($model){
  
                  return $model->status==1?'Active':'Inactive';
                }
            ],

            [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{update}',
              'buttons'=>[
                'update'=>function($url,$model){
                  $icon = "<span class='glyphicon glyphicon-pencil'></span>";
                  return Html::a($icon,['/survey-contact-person/update','id'=>$model->Id]);
                }
              ]
          ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
