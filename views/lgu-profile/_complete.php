<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\console\widgets\Table;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\LguProfile;
use app\models\Coachlgu;
?>



<div class="container-fluid no-side-padding">
  <div class="panel panel-default">
    <div id="panel-heading-title" class="panel-heading" >
      <h2 class="header-no-margin">
        COMPLETION

        <!-- !-->
        <?php
      //$security = LguSecurity::find()->where(['LguProfileId' => $model->Id])->all();
      if(Yii::$app->user->identity->UserType == 2 ){
        $coach = Coachlgu::find()->where(['id' => $id])->all();

        $lguProfile = LguProfile::find()->where(['MunicipalityCityId' => $id])->all();
        if($lguProfile[0]->isFinalized== 1)
        {
          echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/var/www/html/eReadiness/views/lgu-profile/mpdf-demo1', 'id' => $lguProfile[0]->Id]), ['class' => 'btn btn-danger pull-right','target'=>'_blank']);
          $readOnlyFinalize = true;
        }
        else{
          $readOnlyFinalize = false;
        }
        Modal::begin([
          'header' => '<h4>Finalize</h4>',
          'toggleButton' => ['label' => 'Finalize','class' =>'btn btn-infp pull-right', 'style' => 'margin-right:8px;'],
          'clientOptions' => [
                  'backdrop' => 'static',
                  'keyboard' => false,
                ],
      ]);


      $csrf = Yii::$app->request->getCsrfToken();

      echo "<div id='modelContent' tabindex='-1' role='document' class='modal-dialog modal-dialog-centered' aria-hidden='true'>";
      // echo "</div>";
      echo "Are you sure you want to finalize your survey?</br>";

      echo '<br/>';

      echo Html::button('Submit and finish',['class'=>'btn btn-success next-step','onclick'=>'
                $.ajax({
             type: "POST",
             url: "'.Yii::$app->request->baseUrl.'/index.php/lgu-profile/finish",
             data: {
                 id: '.$id.'
             },
             success: function(data) {
              console.log("success");
              location.reload();
             }

          });
      ']);
  echo '<button type="button" id ="modelClose" value="Button" class="btn btn-default next-step">Back</button>';

echo "</div>";
Modal::end();
}
elseif(Yii::$app->user->identity->UserType == 3 ){
  $coach = Coachlgu::find()->where(['PsgcMunicipalityCityId' => $id,'CoachId'=> Yii::$app->user->identity->CoachId])->all();
  $lguProfile = LguProfile::find()->where(['MunicipalityCityId' => $coach[0]->PsgcMunicipalityCityId])->all();

  if($lguProfile[0]->isFinalized== 1)
  {
    echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/var/www/html/eReadiness/views/lgu-profile/mpdf-demo1', 'id' => $lguProfile[0]->Id]), ['class' => 'btn btn-danger pull-right','target'=>'_blank']);
    $readOnlyFinalize = true;
  }
  else{
    $readOnlyFinalize = false;
  }
  Modal::begin([
    'header' => '<h4>Finalize</h4>',
    'toggleButton' => ['label' => 'Finalize','class' =>'btn btn-info pull-right','style' => 'margin-right:8px;'],
    'clientOptions' => [
                  'backdrop' => 'static',
                  'keyboard' => false,
                ],
]);


$csrf = Yii::$app->request->getCsrfToken();

echo "<div id='modelContent' tabindex='-1' role='document' class='modal-dialog modal-dialog-centered' aria-hidden='true'>";
//    echo "</div>";
  echo "Are you sure you want to finalize your survey?</br>";

  echo '<br/>';

  echo Html::button('Submit and finish',['class'=>'btn btn-success next-step','onclick'=>'
                $.ajax({
             type: "POST",
             url: "'.Yii::$app->request->baseUrl.'/index.php/lgu-profile/finish",
             data: {
                 id: '.$id.'
             },
             success: function(data) {
              console.log("success");
              location.reload();
             }

          });
      ']);
  echo '<button type="button" id ="modelClose" value="Button" class="btn btn-default next-step">Back</button>';

echo "</div>";
Modal::end();
}
else{

  $lguProfile = LguProfile::find()->where(['MunicipalityCityId' => $id])->all();
  if($lguProfile[0]->isFinalized== 1)
  {
    echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/var/www/html/eReadiness/views/lgu-profile/mpdf-demo1', 'id' => $lguProfile[0]->Id]), ['class' => 'btn btn-danger pull-right','target'=>'_blank',]);
    $readOnlyFinalize = true;
  }
  else{
    $readOnlyFinalize = false;
  }

  Modal::begin([
    'header' => '<h4>Finalize</h4>',
    'toggleButton' => ['label' => 'Finalize','class' =>'btn btn-info pull-right','style' => 'margin-right:8px;'],
    'clientOptions' => [
                  'backdrop' => 'static',
                  'keyboard' => false,
                ],
    ]);


    $csrf = Yii::$app->request->getCsrfToken();

  echo "<div id='modelContent' tabindex='-1' role='document' class='modal-dialog modal-dialog-centered' aria-hidden='true'>";
  //echo "</div>";
  echo "Are you sure you want to finalize your survey?"."</br>";

  echo '<br/>';

    echo Html::button('Submit and finish',['class'=>'btn btn-success next-step','onclick'=>'
                $.ajax({
             type: "POST",
             url: "'.Yii::$app->request->baseUrl.'/index.php/site/finalizedsurvey",
             data: {
                 id: '.$id.'
             },
             success: function(result) {
               location.reload();
             }
          });
      ']);
    echo '<button type="button" id ="modelClose" value="Button" class="btn btn-default next-step">Back</button>';

    echo "</div>";
    Modal::end();
    }

    ?>
      </h2>
      <p class="header-no-margin"> Please click the "Finalize" button to submit the form. </p>
    </div>

  </div>
</div>
