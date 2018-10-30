<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Psgcmunicipalitycity;
use yii\helpers\ArrayHelper;
use app\models\LguProfile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LguProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); \\]

    $userType =  Yii::$app->user->identity->UserType;
    //$lgu = Lguprofile::find();
    $lgu = new LguProfile();
    if($userType==2){?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [


            ['class' => 'yii\grid\SerialColumn'],

            // 'Id',
            // 'CoachId',

            [
                'attribute'=>'MunicipalityCityId',
                'value'=>'municipalityCity.MunicipalityCityName'
            ],
            [
                'header'=>'Province',
                'attribute'=>'new_business_corporation',
                // 'attribute'=>'municipalityCity.psgcmunicipalitycities.ProvinceName',
                'value'=> 'municipalityCity.province.ProvinceName'
            ],
            [
                'header'=>'Region',
                'attribute'=>'new_business_cooperative',
                'value'=> 'municipalityCity.province.region.RegionName'
            ],



            [
                'attribute'=>'IncomeClassId',
                'filter'=>array("1"=>"1st Class","2"=>"2nd Class","3"=>"3rd Class","4"=>"4th Class","5"=>"5th Class","6"=>"6th Class","7"=>"7th Class","8"=>"Other Class"),
                'value'=>function($model){
                    if($model->IncomeClassId==1){
                        return '1st Class';
                    }
                    elseif($model->IncomeClassId==2){
                        return '2nd Class';
                    }
                    elseif($model->IncomeClassId==3){
                        return '3rd Class';
                    }
                    elseif($model->IncomeClassId==4){
                        return '4th Class';
                    }
                    elseif($model->IncomeClassId==5){
                        return '5th Class';
                    }
                    elseif($model->IncomeClassId==6){
                        return '6th Class';
                    }
                    elseif($model->IncomeClassId==7){
                        return 'Special Class';
                    }
                    elseif($model->IncomeClassId==8){
                        return $model->OtherClass;
                    }
                    else{

                    }
                  //return $model->isFinalized==1?'Active':'Inactive';
                }
              ],
            [
                'header'=>'Level',
                'attribute'=>'new_business_partnership',
                'filter'=>array("1"=>"City","0"=>"Municipality"),
                'value'=>function($model){
                    if($model->municipalityCity->Level==1){
                        return 'City';
                    }

                    else{
                        return 'Municipality';
                    }
                  //return $model->isFinalized==1?'Active':'Inactive';
                }
              ],
            [
                'attribute'=>'isFinalized',
                'filter'=>array("1"=>"Completed","0"=>"None","2"=>"Incomplete"),
                'value'=>function($model){
                    if($model->isFinalized==1){
                        return 'Completed';
                    }
                    elseif($model->isFinalized==2){
                        return 'Incomplete';
                    }
                    else{
                        return 'None';
                    }
                  //return $model->isFinalized==1?'Active':'Inactive';
                }
              ],
              [
                'attribute'=>'DateComplete',
                'value'=>function($model){
                    if(isset($model->DateComplete)){
                  return date('M d, Y',  strtotime($model->DateComplete));
                }
                }
              ],

            // 'Status',
            [
                'header' => 'Actions',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lguAnswer}{undoSubmission}{unblock}',
                'buttons'=>[
                  'lguAnswer'=>function($url, $model, $key){
                      return Html::a('<i class="glyphicon glyphicon-edit"></i>', ['index.php/lgu-profile/view-answer', 'id' => $key], ['class' => 'btn btn-sm btn-primary', 'title' => 'Answer Sheet', 'style'=>'margin-bottom:2px; margin-right:2px;']);
                  },
                  'undoSubmission'=>function($url, $model, $key){
                      return Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index.php/user/undosubmission', 'id' => $key], ['class' => 'btn btn-sm btn-warning', 'title' => 'Undo Submission', 'style'=>'margin-bottom:2px;']);
                  },
                  'unblock'=>function($url, $model, $key){
                    return Html::a('Unblock', ['index.php/user/unblock', 'id' => $key], ['class' => 'btn btn-sm btn-danger', 'title' => 'Unblock Account']);
                  },
                ],

            ]

        ],




    ]);?>
    <?php } else {?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            ['class' => 'yii\grid\SerialColumn'],

            // 'Id',
            // 'CoachId',
            [
                'header'=>'LGU Name',
                'attribute'=>'MunicipalityCityId',
                'value'=>'psgcMunicipalityCity.MunicipalityCityName'
            ],

            [
                'header'=>'Province',
                'attribute'=>'new_business_corporation',
                // 'attribute'=>'municipalityCity.psgcmunicipalitycities.ProvinceName',
                'value'=> 'psgcMunicipalityCity.province.ProvinceName'
            ],
            [
                'header'=>'Region',
                'attribute'=>'new_business_cooperative',
                'value'=> 'province.region.RegionName'
            ],

            [
                // municipalityCity.province.lguprofile.IncomeClass
                'attribute'=>'.lguProfile.IncomeClassId',
                'filter'=>array("1"=>"1st Class","2"=>"2nd Class","3"=>"3rd Class","4"=>"4th Class","5"=>"5th Class","6"=>"6th Class","7"=>"7th Class","8"=>"Other Class"),
                'value'=>function($model){
                    if($model->lguProfile->IncomeClassId==1){
                        return '1st Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==2){
                        return '2nd Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==3){
                        return '3rd Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==4){
                        return '4th Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==5){
                        return '5th Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==6){
                        return '6th Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==7){
                        return 'Special Class';
                    }
                    elseif($model->lguProfile->IncomeClassId==8){
                        return $model->OtherClass;
                    }
                    else{

                    }
                  //return $model->isFinalized==1?'Active':'Inactive';
                }

              ],

              [
                'attribute'=>'lguProfile.isFinalized',
                'value'=>function($model){
                    if($model->lguProfile->isFinalized==1){
                        return 'Completed';
                    }
                    elseif($model->lguProfile->isFinalized==2){
                        return 'Incomplete';
                    }
                    else{
                        return 'None';
                    }
                  //return $model->isFinalized==1?'Active':'Inactive';
                }
              ],
              [
                'attribute'=>'DateComplete',
                'value'=>function($lgu){
                    if(isset($lgu->DateComplete)){
                  return date('M d, Y',  strtotime($lgu->DateComplete));
                }
                }
              ],
            // 'Status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lguAnswer}{unblock}{undoSubmission}',
                'buttons'=>[
                  'lguAnswer'=>function($url, $model, $key){
                      return Html::a('Answer', ['index.php/lgu-profile/view-answer', 'id' => $key], ['class' => 'btn btn-primary']);
                  },
                  'unblock'=>function($url, $model, $key){
                      return Html::a('Unblock', ['index.php/user/unblock', 'id' => $key], ['class' => 'btn btn-danger']);
                  },
                  'undoSubmission'=>function($url, $model, $key){
                      return Html::a('Undo Submission', ['index.php/user/undosubmission', 'id' => $key], ['class' => 'btn btn-warning']);
                  }
                ]
            ]

        ],


    ]);?>

    <?php } ?>


    <?php Pjax::end(); ?>
</div>
