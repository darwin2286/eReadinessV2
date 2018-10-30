<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeePositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Positions';
?>
<div class="employee-position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
      'enablePushState' => false
    ]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee Position', ['/employee-position/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PositionDescription',
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
                  return Html::a($icon,['/employee-position/update','id'=>$model->Uuid]);
                }
              ]
          ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
