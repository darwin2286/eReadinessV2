<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LceTermSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LCE Terms';

?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create LCE Term', ['/lce-term/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin([
      'enablePushState' => false
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'description',
            [
              'attribute'=>'Status',
              'filter'=>array("1"=>"Active","2"=>"Inactive"),
              'value'=>function($model){

                return $model->Status==1?'Active':'Inactive';
              }
              
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{update}',
              'buttons'=>[
                'update'=>function($url,$model){
                  $icon = "<span class='glyphicon glyphicon-pencil'></span>";
                  return Html::a($icon,['/lce-term/update','id'=>$model->Uuid]);
                }
              ]
          ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
  
