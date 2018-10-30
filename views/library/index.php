<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LceTermSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Library';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lce-term-index">

    <?php
      echo Tabs::widget([
        'items'=>[
          [
            'label'=>'LCE Term',
            'content'=>Yii::$app->controller->renderPartial('/lce-term/index', ['searchModel' => $searchModel,'dataProvider' => $dataProvider]) ,
          ],
          [
            'label'=>'Income Class',
            'content'=>Yii::$app->controller->renderPartial('/income-class/index', ['searchModel' => $searchIncomeClass,'dataProvider' => $dataProviderIncomeClass]) ,
          ],
          [
            'label'=>'Employment Status',
            'content'=>Yii::$app->controller->renderPartial('/employment-status/index', ['searchModel' => $searchEmploymentStatus,'dataProvider' => $dataProviderEmploymentStatus]) ,
          ],
          [
            'label'=>'Employee Position',
            'content'=>Yii::$app->controller->renderPartial('/employee-position/index', ['searchModel' => $searchEmployeePosition,'dataProvider' => $dataProviderEmployeePosition]) ,
          ],
          [
            'label'=>'Course',
            'content'=>Yii::$app->controller->renderPartial('/course/index', ['searchModel' => $searchCourse,'dataProvider' => $dataProviderCourse]) ,
          ],
          [
            'label'=>'Software OS',
            'content'=>Yii::$app->controller->renderPartial('/software-os/index', ['searchModel' => $searchSoftwareOs,'dataProvider' => $dataProviderSoftwareOs]) ,
          ],
          [
            'label'=>'Fronltline Service',
            'content'=>Yii::$app->controller->renderPartial('/frontline-service/index', ['searchModel' => $searchFrontlineService,'dataProvider' => $dataProviderFrontlineService]) ,
          ],
          [
            'label'=>'Coaches',
            'content'=>Yii::$app->controller->renderPartial('/coaches/index', ['searchModel' => $searchCoaches,'dataProvider' => $dataProviderCoaches]) ,
          ],
          [
            'label'=>'Cluster',
            'content'=>Yii::$app->controller->renderPartial('/cluster/index', ['searchModel' => $searchCluster,'dataProvider' => $dataProviderCluster]) ,
          ],
          [
            'label'=>'User',
            'content'=>Yii::$app->controller->renderPartial('/user/index', ['searchModel' => $searchUser,'dataProvider' => $dataProviderUser]) ,
          ],
          [
            'label'=>'Contact Person',
            'content'=>Yii::$app->controller->renderPartial('/survey-contact-person/index', ['searchModel' => $searchContactPerson,'dataProvider' => $dataProviderSurveyContactPerson]) ,
          ]
        ]
      ])

    ?>
</div>
