<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SoftwareOsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Software Operating System';
?>
<div class="software-os-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
      'enablePushState' => false
    ]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Software Operating System', ['/software-os/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OSDescription',
            [
              'attribute'=>'Status',
              'filter'=>array("1"=>"Active","2"=>"Inactive"),
              'value'=>function($model){
                return $model->Status==1?'Active':'Inactive';
              }
            ],
            [
              'attribute'=>'WorkstationServer',
              'value'=>function($model){

                return $model->WorkstationServer==1?'Workstation':'Server';
              }
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{update}',
              'buttons'=>[
                'update'=>function($url,$model){
                  $icon = "<span class='glyphicon glyphicon-pencil'></span>";
                  return Html::a($icon,['/software-os/update','id'=>$model->Uuid]);
                }
              ]
          ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
