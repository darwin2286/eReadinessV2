<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\console\widgets\Table;
use app\models\EmploymentStatus;
use app\models\EmployeePosition;
use app\models\LguEmployeePosition;
use app\models\LguEmployee;
use app\models\Course;
use app\models\LguEmployeeCourse;
use yii\helpers\Url;
use app\models\LguProfile;
use app\models\Coachlgu;
/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
  $model = LguProfile::find()->all();
  $employmentStatus = EmploymentStatus::find()->all();
  $position = EmployeePosition::find()->all();
  $countEmploymentStatus = EmploymentStatus::find()->count();
  $lguProfile = LguProfile::find()->all();
  $usertype =Yii::$app->user->identity->UserType;
  if($usertype ==3){
    $print = Coachlgu::find()->where(['PsgcMunicipalityCityId' => $id,'CoachId'=> Yii::$app->user->identity->CoachId])->all();
    //$print = Coachlgu::find('PsgcMunicipalityCityId')->where(['id' => $id,'CoachId'=> Yii::$app->user->identity->CoachId])->one();
    $printid =$print[0]->PsgcMunicipalityCityId;

  }
  else{
    $printid = $id;
  }
?>
<?php $form = ActiveForm::begin([
  'id' => 'hr-capacity-form',
  'enableClientValidation'=>false,

])?>
<?php
  if($isFinalized == 1)
  {
    //echo Html::a('PRINT', Url::toRoute(['/lgu-profile/mpdf-demo1', 'id' => $model->Id]), ['class' => 'btn btn-success','target'=>'_blank','style'=>'position:absolute;left:1050px;top:-70px;']);
    echo Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::toRoute(['/index.php/lgu-profile/mpdf-demo1', 'id' => $printid]), ['class' => 'btn btn-danger pull-right','target'=>'_blank', 'style' => 'margin-top:19px; margin-right:15px;']) ;
    $readOnlyFinalize = true;
  }else{
    $readOnlyFinalize = false;
  }
?>

<div class="container-fluid no-side-padding">
  <div class="panel panel-default">
    <div id="panel-heading-title" class="panel-heading" >
      <h2 class="header-no-margin">
        PART II A.HUMAN RESOURCE CAPACITY
      </h2>
    </div>
    <div class="panel-body no-padding">
      <!-- 1. Total number of employees at your LGU !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            1. Total Number of Employees at your LGU
          </h4>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-bordered hr-capacity-table">
            <thead>
              <tr class="active">
                <th style="vertical-align:middle;">Sex</th>
                <?php
                  foreach($employmentStatus as $employStat)
                    {
                      echo "<th style='vertical-align:middle'>".$employStat['EmploymentStatusDescription']."</th>";
                    }
                ?>
                <th class="danger" style="vertical-align:middle">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center primary font-weight__bold" style="width:150px; color:#fff; vertical-align:middle;">Male Employees</td>
                <?php
                  foreach($employmentStatus as $employStat)
                  {
                    $lguEmployee = LguEmployee::findOne(['LguProfileId'=>$id,'EmployementStatusId'=>$employStat['Id']]);
                    echo "<td>".Html::input('number', 'male'.$employStat['Id'], $lguEmployee['EmployeeMale'], ['id'=>'male'.$employStat['Id'],'class' => 'form-control','readonly'=>$readOnlyFinalize,'min'=>0, 'style'=> 'width:100% !important;'])."</td>";
                  }
                ?>
                <td>
                  <?= Html::input('number', 'maleTotal', '', ['id'=>'maleTotal','class' => 'form-control','readonly'=>true, 'style'=> 'width:100% !important;']) ?>
                </td>
              </tr>

              <tr>
                <td class="text-center primary font-weight__bold" style="width:150px; color:#fff; vertical-align:middle;">Female Employees</td>
                <?php
                  foreach($employmentStatus as $employStat)
                  {
                    $lguEmployee = LguEmployee::findOne(['LguProfileId'=>$id,'EmployementStatusId'=>$employStat['Id']]);
                    echo "<td>".Html::input('number', 'female'.$employStat['Id'], $lguEmployee['EmployeeFemale'], ['id'=>'female'.$employStat['Id'],'class' => 'form-control','readonly'=>$readOnlyFinalize,'min'=>0, 'style'=> 'width:100% !important;'])."</td>";
                  }
                ?>
                <td>
                  <?= Html::input('number', 'femaleTotal', '', ['id'=>'femaleTotal','class' => 'form-control','readonly'=>true, 'style'=> 'width:100% !important;']) ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- 2. Number of employees per Office !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            2. Number of employees per Office
          </h4>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-bordered hr-capacity-table">
            <thead>
              <tr class="active">
                <th>Number</th>
                <th> Office</th>
                </tr>
            </thead>
            <tbody class="number-of-emp-office">
              <tr>
                <td style="vertical-align:middle !important;">
                  <?= $form->field($modelLguOffice, 'ICTOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> a.&nbsp;&nbsp;Information and Communications Technology (ICT) or Management Information System (MIS)</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'BPLOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> b.&nbsp;&nbsp;Business Permits and Licensing Office (BPLO)</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'TreasurtOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> c.&nbsp;&nbsp;Treasury Office</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'OBOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> d.&nbsp;&nbsp;Office of the Building Official (OBO)</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'HealthOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> e.&nbsp;&nbsp;Sanitary/Health Office</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'PDOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> f.&nbsp;&nbsp;Planning and Development Office</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'ZonningOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> g.&nbsp;&nbsp;Zoning Office</p>
                </td>
              </tr>
              <tr>
                <td>
                <?= $form->field($modelLguOffice, 'EngineeringOffice')->textInput(['type' => 'number','readonly'=>$readOnlyFinalize,'min'=>0])->label(false) ?>
                </td>
                <td style="vertical-align:middle">
                  <p class="header-no-margin"> h.&nbsp;&nbsp;Engineering Office</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            3. Number of personnel performing the following designated roles and their employment status
          </h4>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-bordered table-striped">
            <tr class="active">
              <th rowspan = "2" style="vertical-align:middle;" class="text-center">Designation</th>
              <th colspan = "<?php echo $countEmploymentStatus+1?>" style="vertical-align:middle;" class="text-center">NUMBER OF PERSONNEL</th>
            </tr>
            <tr>
              <?php
                foreach($employmentStatus as $employStat)
                {
                  echo "<th style='vertical-align:middle;' class='text-center active'>".$employStat['EmploymentStatusDescription']."</th>";
                }
              ?>
              <th class="danger text-center" style="vertical-align:middle;">TOTAL</th>
            </tr>
            <?php
              foreach($position as $pos)
              {
                echo "<tr><td class='font-weight__bold'>".$pos['PositionDescription']."</td>";
                foreach($employmentStatus as $employStat)
                {
                  $lguPosition = LguEmployeePosition::findOne(['LguProfileId'=>$id, 'EmployeeStatusId'=>$employStat['Id'], 'EmployeePositionId'=>$pos['Id']]);
                  echo "<td>".Html::input('number', $pos['PositionDescription'].$employStat['Id'],$lguPosition['NoOfEmployee'], ['id'=>$pos['PositionDescription'].$employStat['Id'],'class' => 'form-control','readonly'=>$readOnlyFinalize,'min'=>0, 'style' => 'width:100% !important;'])."</td>";
                }
                echo "<td>".Html::input('text', "total".$pos['PositionDescription'],$lguPosition['NoOfEmployee'], ['id'=>"total".$pos['PositionDescription'],'class' => 'form-control','readonly'=>true, 'style'=> 'width:100% !important;'])."</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </div>
      </div>

      <!-- 4. Number of Trained personnel !-->
      <div class="panel panel-primary no-panel-border">
        <div class="panel-heading">
          <h4 class="header-no-margin" style="color:#fff;">
            3. Number of Trained Personnel
          </h4>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table table-bordered table-striped hr-capacity-table">
            <thead>
              <tr class="active">
                <th>Course</th>
                <th>Number of Personnel</th>
                <th>Sub-topic of Training/Course</th>
              </tr>
            </thead>
            <tbody>
              <?php
                 $courses = Course::find()->where(['Subtopic'=>0])->all();
                 foreach($courses as $course)
                 {
                   $countParent = Course::find()->where(['ParentId'=>$course['Id']])->count();
                   $rowspan = $countParent + 1;
                   if($countParent == 0)
                   {
                     $existCourseNum = LguEmployeeCourse::findOne(['LguProfileId'=>$id,'CourseId'=>$course['Id']]);
                     echo "<tr>";
                     echo "<td rowspan = '".$rowspan."' class='font-weight__bold'>".$course['CourseDescription']."</td>";
                     echo "<td>";
                     echo Html::input('number',"number".$course['CourseDescription'].$course['Id'],$existCourseNum['NoOfEmployee'],['class' => 'form-control','readonly'=>$readOnlyFinalize,'min'=>0]);
                     echo "</td>";
                     echo "<td>";
                     echo "</td>";
                     echo "</tr>";
                   }else{
                     echo "<tr>";
                     echo "<td colspan = '3' class='font-weight__bold'>".$course['CourseDescription']."</td>";
                     echo "</tr>";
                   }

                   if($countParent > 0)
                   {
                     $subCourses = Course::find()->where(['ParentId'=>$course['Id']])->all();
                     foreach($subCourses as $subCourse)
                     {
                       $existCourseNum = LguEmployeeCourse::findOne(['LguProfileId'=>$id,'CourseId'=>$subCourse['Id']]);

                       if($existCourseNum['checkSubCourse'] == 1)
                       {
                         $checked = $existCourseNum['CourseId'];
                         //echo $checked;exit;
                       }else{
                         $checked = false;
                       }
                       echo "<tr>";
                       echo "<td></td>";
                       echo "<td>";
                         echo Html::input('number',"number".$subCourse['CourseDescription'].$subCourse['Id'],$existCourseNum['NoOfEmployee'],['id'=>"number".$subCourse['CourseDescription'].$subCourse['Id'],'class' => 'form-control','readonly'=>$readOnlyFinalize,'min'=>0]);
                       echo "</td>";
                       echo "<td>";
                       echo $subCourse['CourseDescription'];
                       if($subCourse['CourseDescription'] == 'Other' || $subCourse['Id'] == 22)
                       {
                         if($subCourse['Id'] == 25)
                         {
                           $otherSubCourse = $existCourseNum['OtherProgramming'];

                         }else if($subCourse['Id'] == 26)
                         {
                           $otherSubCourse = $existCourseNum['OtherDatabase'];
                         }else{
                           $otherSubCourse = $existCourseNum['OtherNoSql'];
                         }

                         echo Html::input('text','otherSubtopic'.$subCourse['Id'],$otherSubCourse,['id'=>'otherSubtopic'.$subCourse['Id'],'class'=>'form-control','readOnly'=>$readOnlyFinalize,'min'=>0]);
                       }
                       echo "</td>";
                       echo "</tr>";
                     }
                   }
                 }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Contact Person !-->
      <div class="panel panel-primary no-panel-border" style="margin-bottom:0px !important;">
        <div class="panel-heading">
          <h3 class="header-no-margin" style="color:#fff;">
            CONTACT PERSON
          </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px;">
          <table class="table hr-capacity-table table-striped">
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Name', 'ConatactName',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactParttwo, 'ConatactName')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnameid2'])->label(false) ?>
              </td>

              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Email Address', 'ContactEmail',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactParttwo, 'ContactEmail')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactemailid2'])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Designation', 'ContactDesignation',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactParttwo, 'ContactDesignation')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactdesignationid2'])->label(false) ?>
              </td>

              <td class="text-right" style="width:250px; vertical-align:middle;">
                <div style="font-size:16px;">
                  <?= Html::label('Contact Number', 'ContactNo',['class'=>'control-label']) ?>
                </div>
              </td>
              <td>
                <?= $form->field($modelContactParttwo, 'ContactNo')->textInput(['maxlength' => true,'readOnly'=>$readOnlyFinalize,'id'=>'contactnumberid2'])->label(false) ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $modelLguEmployee['LguProfileId']=$id;
  $modelLguOffice['LguProfileId']=$id;
  $modelLguPosition['LguProfileId']=$id;
  $modelLguCourse['LguProfileId']=$id;
  $modelContactParttwo['LguProfileId']=$id;
  $modelContactParttwo['PartNo'] =2;
?>
  <?= $form->field($modelLguEmployee, 'LguProfileId')->hiddenInput()->label(false) ?>
  <?= $form->field($modelLguOffice, 'LguProfileId')->hiddenInput()->label(false) ?>
  <?= $form->field($modelLguPosition, 'LguProfileId')->hiddenInput()->label(false) ?>
  <?= $form->field($modelLguCourse, 'LguProfileId')->hiddenInput()->label(false) ?>
  <?= $form->field($modelContactParttwo, 'LguProfileId')->hiddenInput()->label(false) ?>
  <?= $form->field($modelContactParttwo, 'PartNo')->hiddenInput()->label(false) ?>
<?php ActiveForm::end(); ?>
<?php
  $this->registerJsFile(
      '@web/js/hrCapacity.js',
      ['depends' => [\yii\web\JqueryAsset::className()]]
  );
?>
