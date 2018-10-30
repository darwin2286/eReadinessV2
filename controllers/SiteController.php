<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LguProfile;
use app\models\Psgcmunicipalitycity;
use app\models\LguProfileSearch;
use app\models\ContactPerson;
use app\models\LguEmployee;
use app\models\EmploymentStatus;
use app\models\EmployeePosition;
use app\models\LguEmployeePosition;
use app\models\LguEmployeeOffice;
use app\models\LguEmployeeCourse;
use app\models\Course;
use app\models\LguComputingDevice;
use app\models\LguHardwarePeripherals;
use app\models\LguServer;
use app\models\LguOsAdmin;
use app\models\LguOsOther;
use app\models\LguFrontlineService;
use app\models\FrontlineService;
use app\models\LguFrontlineServiceOther;
use app\models\LguNetwork;
use app\models\LguSecurity;
use app\models\LguCloud;
use app\models\User;






class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }






    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($step = 1)
    {
          if (Yii::$app->user->isGuest) {
            $this->redirect('index.php/site/login');

          }else{


        $id = Yii::$app->user->identity->LguProfileId;
        $model = LguProfile::findOne($id);

        $modelProfile = LguProfile::findOne($id);
        $municipalityCity = Psgcmunicipalitycity::findOne($model->MunicipalityCityId);

        $countContactPartOne = ContactPerson::find()->where(['LguProfileId'=>$id])->andWhere(['PartNo'=>1])->count();
        if($countContactPartOne > 0)
        {
            $modelContactPartOne = ContactPerson::findOne(['LguProfileId'=>$id, 'PartNo'=>1]);
        }else{
            $modelContactPartOne = new ContactPerson();
        }

        $countContactParttwo = ContactPerson::find()->where(['LguProfileId'=>$id])->andWhere(['PartNo'=>2])->count();
        if($countContactParttwo > 0)
        {
            $modelContactParttwo = ContactPerson::findOne(['LguProfileId'=>$id, 'PartNo'=>2]);
        }else{
            $modelContactParttwo = new ContactPerson();
        }

        $countContactPartthree = ContactPerson::find()->where(['LguProfileId'=>$id])->andWhere(['PartNo'=>3])->count();
        if($countContactPartthree > 0)
        {
            $modelContactPartthree = ContactPerson::findOne(['LguProfileId'=>$id, 'PartNo'=>3]);
        }else{
            $modelContactPartthree = new ContactPerson();
        }


        $countLguEmployee = LguEmployee::find()->where(['LguProfileId'=>$id])->count();
        if($countLguEmployee > 0)
        {
          $modelLguEmployee = LguEmployee::findOne(['LguProfileId'=>$id]);
        }else{
          $modelLguEmployee = new LguEmployee();
        }

        $countLguPosition = LguEmployeePosition::find()->where(['LguProfileId'=>$id])->count();
        if($countLguPosition > 0)
        {
          $modelLguPosition = LguEmployeePosition::findOne(['LguProfileId'=>$id]);
        }else{
          $modelLguPosition = new LguEmployeePosition();
        }

        $countLguOffice = LguEmployeeOffice::find()->where(['LguProfileId'=>$id])->count();
        if($countLguOffice > 0)
        {
          $modelLguOffice = LguEmployeeOffice::findOne(['LguProfileId'=>$id]);
        }else{
          $modelLguOffice = new LguEmployeeOffice();
        }

        $countEmployeeCourse = LguEmployeeCourse::find()->where(['LguProfileId'=>$id])->count();
        if($countEmployeeCourse > 0)
        {
          $modelLguCourse = LguEmployeeCourse::findOne(['LguProfileId'=>$id]);
        }else{
          $modelLguCourse = new LguEmployeeOffice();
        }

        $countComputingDevice = LguComputingDevice::find()->where(['LguProfileId'=>$id])->count();
        if($countComputingDevice > 0)
        {
          $modelComputingDevice = LguComputingDevice::findOne(['LguProfileId'=>$id]);
        }else{
          $modelComputingDevice = new LguComputingDevice();
        }

        $countHardwarePeripherals = LguHardwarePeripherals::find()->where(['LguProfileId'=>$id])->count();
        if($countHardwarePeripherals > 0)
        {
          $modelHardwarePeripherals = LguHardwarePeripherals::findOne(['LguProfileId'=>$id]);
        }else{
          $modelHardwarePeripherals = new LguHardwarePeripherals();
        }

        $countLguServer = LguServer::find()->where(['LguProfileId'=>$id])->count();
        if($countLguServer > 0)
        {
          $modelLguServer = LguServer::findOne(['LguProfileId'=>$id]);
        }else{
          $modelLguServer = new LguServer();
        }

        $countLguOS = LguOsAdmin::find()->where(['LguProfileId'=>$id])->count();
        if($countLguOS > 0)
        {
          $modelOs = LguOsAdmin::findOne(['LguProfileId'=>$id]);
        }else{
          $modelOs = new LguOsAdmin();
        }

        $countLguFronline = LguFrontlineService::find()->where(['LguProfileId'=>$id])->count();
        if($countLguFronline > 0)
        {
          $modelFrontline = LguFrontlineService::findOne(['LguProfileId'=>$id]);
        }else{
          $modelFrontline = new LguFrontlineService();
        }

        $countNetwork = LguNetwork::find()->where(['LguProfileId'=>$id])->count();
        if($countNetwork > 0)
        {
          $modelNetwork = LguNetwork::findOne(['LguProfileId'=>$id]);
        }else{
          $modelNetwork = new LguNetwork();
        }

        $countSecurity = LguSecurity::find()->where(['LguProfileId'=>$id])->count();
        if($countSecurity > 0)
        {
          $modelSecurity = LguSecurity::findOne(['LguProfileId'=>$id]);
        }else{
          $modelSecurity = new LguSecurity();
        }

        $countCloud = LguCloud::find()->where(['LguProfileId'=>$id])->count();
        if($countCloud > 0)
        {
          $modelCloud = LguCloud::findOne(['LguProfileId'=>$id]);
        }else{
          $modelCloud = new LguCloud();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          // echo "<pre>";print_r($model);
          // echo "</pre>"; exit;
          $municipalityCity->load(Yii::$app->request->post());
          $modelProfile->load(Yii::$app->request->post());
          $modelContactPartOne->load(Yii::$app->request->post());

          // echo "<pre>";
          // print_r(array('Profile' => $modelProfile, 'MunicipalityCity' => $municipalityCity, 'Contact' => $modelContactPartOne ));
          // echo "</pre>";
          // exit;

          $municipalityCity->save();
          $modelProfile->save();
          $modelContactPartOne->save();
          $step=2;
        }
        if($modelLguEmployee->load(Yii::$app->request->post()))
        {

          // print_r($modelLguEmployee);
          // exit;
          $employmentStatus = EmploymentStatus::find()->all();
          $modelLguOffice->load(Yii::$app->request->post());
          foreach($employmentStatus as $employStat)
          {
            $countLguEmployee1 = LguEmployee::find()->where(['LguProfileId'=>$id])->andWhere(['EmployementStatusId'=>$employStat['Id']])->count();
            if($countLguEmployee1 > 0)
            {
              $modelLguEmployee1 = LguEmployee::findOne(['LguProfileId'=>$id, 'EmployementStatusId'=>$employStat['Id']]);
            }else{
              $modelLguEmployee1 = new LguEmployee();
            }
            $modelLguEmployee1['LguProfileId'] = $modelLguEmployee['LguProfileId'];
            $modelLguEmployee1['EmployementStatusId'] = $employStat['Id'];
            $modelLguEmployee1['EmployeeMale'] = Yii::$app->request->post('male'.$employStat['Id']);
            $modelLguEmployee1['EmployeeFemale'] = Yii::$app->request->post('female'.$employStat['Id']);
            $modelLguEmployee1->save();

          }
          $modelLguOffice->save();
          if($modelLguPosition->load(Yii::$app->request->post()))
          {
            $position = EmployeePosition::find()->all();
            foreach($position as $pos)
            {
              $employmentStatus = EmploymentStatus::find()->all();
              foreach($employmentStatus as $employStat)
              {
                $countLguPostion = LguEmployeePosition::find()->where(['LguProfileId'=>$id])->andWhere(['EmployeeStatusId'=>$employStat['Id']])->andWhere(['EmployeePositionId'=>$pos['Id']])->count();
                if($countLguPostion > 0)
                {
                  $modelLguPosition1 = LguEmployeePosition::findOne(['LguProfileId'=>$id, 'EmployeeStatusId'=>$employStat['Id'], 'EmployeePositionId'=>$pos['Id']]);
                }else{
                  $modelLguPosition1 = new LguEmployeePosition();
                }
                $modelLguPosition1['LguProfileId']= $modelLguPosition['LguProfileId'];
                $modelLguPosition1['EmployeePositionId'] = $pos['Id'];
                $modelLguPosition1['EmployeeStatusId'] = $employStat['Id'];
                $pos['PositionDescription'] = str_replace(" ","_",$pos['PositionDescription']);
                $modelLguPosition1['NoOfEmployee'] = Yii::$app->request->post($pos['PositionDescription'].$employStat['Id']);
            //    print_r(Yii::$app->request->post());exit;
                $modelLguPosition1->save();
              }
            }
          }
          if($modelLguCourse->load(Yii::$app->request->post()))
          {
            $courses = Course::find()->all();

            foreach($courses as $course)
            {

              $countLguCourse = LguEmployeeCourse::find()->where(['LguProfileId'=>$id])->andWhere(['CourseId'=>$course['Id']])->count();
              if($countLguCourse > 0)
              {
                $modelLguCourse1 = LguEmployeeCourse::findOne(['LguProfileId'=>$id,'CourseId'=>$course['Id']]);
              }else{
                $modelLguCourse1 = new LguEmployeeCourse();
              }
              $courseDesc = str_replace(" ","_",$course['CourseDescription']);
              $courseDesc = str_replace(".","_",$courseDesc);
              $courseDesc1 = $courseDesc.$course['Id'];
              //print_r(Yii::$app->request->post())[0];exit;
              if(Yii::$app->request->post("number".$courseDesc.$course['Id']) != Null || $countLguCourse > 0)
              {
                if(Yii::$app->request->post("number".$courseDesc.$course['Id']) == NUll)
                {
                  $numEmployee = 0;
                }else{
                  $numEmployee = Yii::$app->request->post("number".$courseDesc.$course['Id']);
                }
                $modelLguCourse1['LguProfileId'] = $modelLguCourse['LguProfileId'];
                $modelLguCourse1['CourseId'] = $course['Id'];
                $modelLguCourse1['NoOfEmployee'] = $numEmployee;

                if($course['Id'] == 25)
                {
                  $modelLguCourse1['OtherProgramming'] = Yii::$app->request->post("otherSubtopic".$course['Id']);
                }
                if($course['Id'] == 26)
                {
                  $modelLguCourse1['OtherDatabase'] = Yii::$app->request->post("otherSubtopic".$course['Id']);
                }
                if($course['Id'] == 22)
                {
                  $modelLguCourse1['OtherNoSql'] = Yii::$app->request->post("otherSubtopic".$course['Id']);
                }

                  $modelLguCourse1->save();
              }
            }
          }
          $modelContactParttwo->load(Yii::$app->request->post());
          $modelContactParttwo->save();
          $lguProfileIncomplete = LguProfile::findOne(['Id'=>$modelContactParttwo['LguProfileId']]);
          if($lguProfileIncomplete['isFinalized'] != 1)
          {
            $lguProfileIncomplete['isFinalized'] = 2;
            $lguProfileIncomplete->save();
          }

          // if(Yii::$app->request->post('Submit1')=='nextBtn2')
          // {
          //   echo Yii::$app->request->post('Submit')."sdf";exit;
            $step=3;
          // }else{
          //     echo Yii::$app->request->post('Submit')."asd";exit;
          //   $step=2;
          // }

        }
        if($modelComputingDevice->load(Yii::$app->request->post()))
        {
          $countComputeDevice = LguComputingDevice::find()->where(['LguProfileId'=>$id])->count();
          if($countComputeDevice > 0)
          {
            $modelComputeDevice =  LguComputingDevice::findOne(['LguProfileId'=>$id]);
          }else{
            $modelComputeDevice = new LguComputingDevice();
          }
          $modelComputeDevice->load(Yii::$app->request->post());
          $modelComputeDevice->save();
          if($modelHardwarePeripherals->load(Yii::$app->request->post()))
          {
            $countHardwarePeri = LguHardwarePeripherals::find()->where(['LguProfileId'=>$id])->count();
            if($countHardwarePeri > 0)
            {
              $modelHardwarePeri = LguHardwarePeripherals::findOne(['LguProfileId'=>$id]);
            }else {
              $modelHardwarePeri = new LguHardwarePeripherals();
            }
            $modelHardwarePeri->load(Yii::$app->request->post());
            $modelHardwarePeri->save();
          }
          if($modelLguServer->load(Yii::$app->request->post()))
          {
            $countServer = LguServer::find()->where(['LguProfileId'=>$id])->count();
            if($countServer >0)
            {
              LguServer::deleteAll('LguProfileId = '.$id);
            }

            if(Yii::$app->request->post("capacityStorage1") != Null || Yii::$app->request->post("inHouse1") != Null || Yii::$app->request->post("colocated1") != Null)
            {
              $modelServer = new LguServer();
              $modelServer['LguProfileId'] = $modelLguServer['LguProfileId'];
              $modelServer['CapicityStorage'] = Yii::$app->request->post("capacityStorage1");
              $modelServer['CoLocated'] = Yii::$app->request->post("colocated1");
              $modelServer['InHouse'] = Yii::$app->request->post("inHouse1");
              $modelServer->save();
            }
            if(Yii::$app->request->post("capacityStorage2") != Null || Yii::$app->request->post("inHouse2") != Null || Yii::$app->request->post("colocated2") != Null)
            {
              $modelServer = new LguServer();
              $modelServer['LguProfileId'] = $modelLguServer['LguProfileId'];
              $modelServer['CapicityStorage'] = Yii::$app->request->post("capacityStorage2");
              $modelServer['CoLocated'] = Yii::$app->request->post("colocated2");
              $modelServer['InHouse'] = Yii::$app->request->post("inHouse2");
              $modelServer->save();
            }
            if(Yii::$app->request->post("capacityStorage3") != Null || Yii::$app->request->post("inHouse3") != Null || Yii::$app->request->post("colocated3") != Null)
            {
              $modelServer = new LguServer();
              $modelServer['LguProfileId'] = $modelLguServer['LguProfileId'];
              $modelServer['CapicityStorage'] = Yii::$app->request->post("capacityStorage3");
              $modelServer['CoLocated'] = Yii::$app->request->post("colocated3");
              $modelServer['InHouse'] = Yii::$app->request->post("inHouse3");
              $modelServer->save();
            }
          }
          if($modelOs->load(Yii::$app->request->post()))
          {
            $osWork = "";
            $osServerList = "";
            $countOsWork = count($modelOs['OSWorkstation']);
            $countOsServer = count($modelOs['OSServer']);
            $a=1;
            $b=1;
            if($modelOs['OSWorkstation'] != Null)
            {
              foreach($modelOs['OSWorkstation'] as $osWorkstation)
              {
                if($a < $countOsWork)
                {
                  $osWork = $osWork.$osWorkstation.",";
                }else{
                  $osWork = $osWork.$osWorkstation;
                }
                $a++;
              }
            }
            if($modelOs['OSServer'] != Null)
            {
              foreach($modelOs['OSServer'] as $osServer)
              {
                if($b < $countOsServer)
                {
                  $osServerList = $osServerList.$osServer.",";
                }else{
                  $osServerList = $osServerList.$osServer;
                }
                $b++;
              }
            }
            $modelOs['OSWorkstation'] = $osWork;
            $modelOs['OSServer'] = $osServerList;
            if($modelOs['CBMS'] != Null)
            {
              if($modelOs['CBMS'][0] != Null)
              {
                $modelOs['CBMS'] = 1;
              }else{
                $modelOs['CBMS'] = 0;
              }
            }
            if($modelOs['HRMIS'] != Null)
            {
              if($modelOs['HRMIS'][0] != Null)
              {
                $modelOs['HRMIS'] = 1;
              }else{
                $modelOs['HRMIS'] = 0;
              }
            }
            if($modelOs['LGPMS'] != Null)
            {
              if($modelOs['LGPMS'][0] != Null)
              {
                $modelOs['LGPMS'] = 1;
              }else{
                $modelOs['LGPMS'] = 0;
              }
            }
            if($modelOs['PayrollSystem'] != Null)
            {
              if($modelOs['PayrollSystem'][0] != Null)
              {
                $modelOs['PayrollSystem'] = 1;
              }else{
                $modelOs['PayrollSystem'] = 0;
              }
            }
            if($modelOs['PIS'] != Null)
            {
              if($modelOs['PIS'][0] != Null)
              {
                $modelOs['PIS'] = 1;
              }else{
                $modelOs['PIS'] = 0;
              }
            }
            if($modelOs['ProcurementSystem'] != Null)
            {
              if($modelOs['ProcurementSystem'][0] != Null)
              {
                $modelOs['ProcurementSystem'] = 1;
              }else{
                $modelOs['ProcurementSystem'] = 0;
              }
            }
            if($modelOs['ProjectMonitoringSystem'] != Null)
            {
              if($modelOs['ProjectMonitoringSystem'][0] != Null)
              {
                $modelOs['ProjectMonitoringSystem'] = 1;
              }else{
                $modelOs['ProjectMonitoringSystem'] = 0;
              }
            }
            if($modelOs['RecordsManagementSystem'] != Null)
            {
              if($modelOs['RecordsManagementSystem'][0] != Null)
              {
                $modelOs['RecordsManagementSystem'] = 1;
              }else{
                $modelOs['RecordsManagementSystem'] = 0;
              }
            }
            if($modelOs['DocumentTrackingSystem'] != Null)
            {
              if($modelOs['DocumentTrackingSystem'][0] != Null)
              {
                $modelOs['DocumentTrackingSystem'] = 1;
              }else{
                $modelOs['DocumentTrackingSystem'] = 0;
              }
            }
            $modelOs->save();
            $countOsOther = LguOsOther::find()->where(['LguOSAdminId'=>$modelOs['Id']])->count();
            if($countOsOther >0)
            {
              LguOsOther::deleteAll('LguOSAdminId = '.$modelOs['Id']);
            }
            if(Yii::$app->request->post("adminSystem1") != Null)
            {
              $modelOsOther = new LguOsOther();
              $modelOsOther['LguOSAdminId'] = $modelOs['Id'];
              $modelOsOther['OtherName'] = Yii::$app->request->post("adminSystem1");
              $modelOsOther->save();
            }
            if(Yii::$app->request->post("adminSystem2") != Null)
            {
              $modelOsOther = new LguOsOther();
              $modelOsOther['LguOSAdminId'] = $modelOs['Id'];
              $modelOsOther['OtherName'] = Yii::$app->request->post("adminSystem2");
              $modelOsOther->save();
            }
            if(Yii::$app->request->post("adminSystem3") != Null)
            {
              $modelOsOther = new LguOsOther();
              $modelOsOther['LguOSAdminId'] = $modelOs['Id'];
              $modelOsOther['OtherName'] = Yii::$app->request->post("adminSystem3");
              $modelOsOther->save();
            }
          }
          if($modelFrontline->load(Yii::$app->request->post()))
          {
            $frontlineService = FrontlineService::find()->all();
            foreach($frontlineService as $fs)
            {
              if($fs['Id'] != 6)
              {
                $countFs = LguFrontlineService::find()->where(['LguProfileId'=>$id])->andWhere(['FrontlineServiceId'=>$fs['Id']])->count();
                if($countFs > 0)
                {
                  $modelFs = LguFrontlineService::findOne(['LguProfileId'=>$id,'FrontlineServiceId'=>$fs['Id']]);
                }else{
                  $modelFs = new LguFrontlineService();
                }
                $modelFs['LguProfileId'] = $modelFrontline['LguProfileId'];
                $modelFs['FrontlineServiceId'] = $fs['Id'];
                if(Yii::$app->request->post($fs['Id']."OnPremise") != Null)
                {
                  $modelFs['OnPremise'] = Yii::$app->request->post($fs['Id']."OnPremise")[0];
                }else{
                  $modelFs['OnPremise'] = 0;
                }
                if(Yii::$app->request->post($fs['Id']."Online") != Null)
                {
                  $modelFs['Online'] = Yii::$app->request->post($fs['Id']."Online")[0];
                }else{
                  $modelFs['Online'] = 0;
                }
                if(Yii::$app->request->post($fs['Id']."ePayment") != Null)
                {
                  $modelFs['ePayment'] = Yii::$app->request->post($fs['Id']."ePayment")[0];
                }else{
                  $modelFs['ePayment'] = 0;
                }
                $modelFs['OnlineUrl'] = Yii::$app->request->post($fs['Id']."Url");
                $modelFs->save();
              }
            }
          }
          $countOtherFS = LguFrontlineServiceOther::find()->where(['LguProfileId'=>$id])->count();
          if($countOtherFS > 0)
          {
            LguFrontlineServiceOther::deleteAll('LguProfileId = '.$id);
          }
          if(Yii::$app->request->post('otherFs1') != Null || Yii::$app->request->post('otherFs1OnPremise') != Null || Yii::$app->request->post('otherFs1Online') != Null || Yii::$app->request->post('otherFs1ePayment') != Null || Yii::$app->request->post('otherFs1Url') != Null)
          {
            $modelOtherFs = new LguFrontlineServiceOther();
            $modelOtherFs['LguProfileId'] = $modelFrontline['LguProfileId'];
            $modelOtherFs['OtherName'] = Yii::$app->request->post('otherFs1');
            $modelOtherFs['OnPremise'] = Yii::$app->request->post('otherFs1OnPremise')[0];
            $modelOtherFs['Online'] = Yii::$app->request->post('otherFs1Online')[0];
            $modelOtherFs['ePayment'] = Yii::$app->request->post('otherFs1ePayment')[0];
            $modelOtherFs['OnlineUrl'] = Yii::$app->request->post('otherFs1Url');
            $modelOtherFs->save();
          }
          if(Yii::$app->request->post('otherFs2') != Null || Yii::$app->request->post('otherFs2OnPremise') != Null || Yii::$app->request->post('otherFs2Online') != Null || Yii::$app->request->post('otherFs2ePayment') != Null || Yii::$app->request->post('otherFs2Url') != Null)
          {
            $modelOtherFs = new LguFrontlineServiceOther();
            $modelOtherFs['LguProfileId'] = $modelFrontline['LguProfileId'];
            $modelOtherFs['OtherName'] = Yii::$app->request->post('otherFs2');
            $modelOtherFs['OnPremise'] = Yii::$app->request->post('otherFs2OnPremise')[0];
            $modelOtherFs['Online'] = Yii::$app->request->post('otherFs2Online')[0];
            $modelOtherFs['ePayment'] = Yii::$app->request->post('otherFs2ePayment')[0];
            $modelOtherFs['OnlineUrl'] = Yii::$app->request->post('otherFs2Url');
            $modelOtherFs->save();
          }
          if(Yii::$app->request->post('otherFs3') != Null || Yii::$app->request->post('otherFs3OnPremise') != Null || Yii::$app->request->post('otherFs3Online') != Null || Yii::$app->request->post('otherFs3ePayment') != Null || Yii::$app->request->post('otherFs3Url') != Null)
          {
            $modelOtherFs = new LguFrontlineServiceOther();
            $modelOtherFs['LguProfileId'] = $modelFrontline['LguProfileId'];
            $modelOtherFs['OtherName'] = Yii::$app->request->post('otherFs3');
            $modelOtherFs['OnPremise'] = Yii::$app->request->post('otherFs3OnPremise')[0];
            $modelOtherFs['Online'] = Yii::$app->request->post('otherFs3Online')[0];
            $modelOtherFs['ePayment'] = Yii::$app->request->post('otherFs3ePayment')[0];
            $modelOtherFs['OnlineUrl'] = Yii::$app->request->post('otherFs3Url');
            $modelOtherFs->save();
          }
          if($modelNetwork->load(Yii::$app->request->post()))
          {
            if($modelNetwork['Intranet'] != NULL)
            {$modelNetwork['Intranet'] = $modelNetwork['Intranet'][0];}
            if($modelNetwork['LAN'] != NULL)
            {$modelNetwork['LAN'] = $modelNetwork['LAN'][0];}
            if($modelNetwork['WAN'] != NULL)
            {$modelNetwork['WAN'] = $modelNetwork['WAN'][0];}
            if($modelNetwork['VPN'] != NULL)
            {$modelNetwork['VPN'] = $modelNetwork['VPN'][0];}
            if($modelNetwork['Intrenet'] != NULL)
            {$modelNetwork['Intrenet'] = $modelNetwork['Intrenet'][0];}
            if($modelNetwork['LeasedLine'] != NULL)
            {$modelNetwork['LeasedLine'] = $modelNetwork['LeasedLine'][0];}
            if($modelNetwork['DSL'] != NULL)
            {$modelNetwork['DSL'] = $modelNetwork['DSL'][0];}
            if($modelNetwork['MobileData'] != NULL)
            {$modelNetwork['MobileData'] = $modelNetwork['MobileData'][0];}
            if($modelNetwork['ISDN'] != NULL)
            {$modelNetwork['ISDN'] = $modelNetwork['ISDN'][0];}
            if($modelNetwork['Satellite'] != NULL)
            {$modelNetwork['Satellite'] = $modelNetwork['Satellite'][0];}
            if($modelNetwork['ISP'] != NULL)
            {$modelNetwork['ISP'] = $modelNetwork['ISP'][0];}

            $modelNetwork->save();
          }
          if($modelSecurity->load(Yii::$app->request->post()))
          {
            if($modelSecurity['ProtectionScheme'] != NULL)
            {$modelSecurity['ProtectionScheme'] = $modelSecurity['ProtectionScheme'][0];}
            if($modelSecurity['SecurityPolicy'] != NULL)
            {$modelSecurity['SecurityPolicy'] = $modelSecurity['SecurityPolicy'][0];}
            if($modelSecurity['DisasterRecoveryPlan'] != NULL)
            {$modelSecurity['DisasterRecoveryPlan'] = $modelSecurity['DisasterRecoveryPlan'][0];}
            if($modelSecurity['DigitalSecurity'] != NULL)
            {$modelSecurity['DigitalSecurity'] = $modelSecurity['DigitalSecurity'][0];}
            if($modelSecurity['Encryption'] != NULL)
            {$modelSecurity['Encryption'] = $modelSecurity['Encryption'][0];}
            if($modelSecurity['UPS'] != NULL)
            {$modelSecurity['UPS'] = $modelSecurity['UPS'][0];}
            if($modelSecurity['HardwareFirewall'] != NULL)
            {$modelSecurity['HardwareFirewall'] = $modelSecurity['HardwareFirewall'][0];}
            if($modelSecurity['SoftwareFirewall'] != NULL)
            {$modelSecurity['SoftwareFirewall'] = $modelSecurity['SoftwareFirewall'][0];}
            if($modelSecurity['SubSecuritySoft'] != NULL)
            {$modelSecurity['SubSecuritySoft'] = $modelSecurity['SubSecuritySoft'][0];}
            if($modelSecurity['EmailAuth'] != NULL)
            {$modelSecurity['EmailAuth'] = $modelSecurity['EmailAuth'][0];}
            if($modelSecurity['OffsiteBackup'] != NULL)
            {$modelSecurity['OffsiteBackup'] = $modelSecurity['OffsiteBackup'][0];}
            if($modelSecurity['SecuredServer'] != NULL)
            {$modelSecurity['SecuredServer'] = $modelSecurity['SecuredServer'][0];}
            if($modelSecurity['Storagebackup'] != NULL)
            {$modelSecurity['Storagebackup'] = $modelSecurity['Storagebackup'][0];}
            if($modelSecurity['ISSP'] != NULL)
            {$modelSecurity['ISSP'] = $modelSecurity['ISSP'][0];}
            $modelSecurity->save();
          }
          if($modelCloud->load(Yii::$app->request->post()))
          {
            //print_r($modelCloud);exit;
            $modelCloud->save();
          }
          $modelContactPartthree->load(Yii::$app->request->post());
          $modelContactPartthree->save();
          $step = 4;
        }
        //echo $step; exit;
        return $this->render('index',['model'=>$model,'id'=>$id,'modelProfile'=>$modelProfile,'modelContactPartthree'=>$modelContactPartthree,'modelCloud'=>$modelCloud,'modelSecurity'=>$modelSecurity,'modelNetwork'=>$modelNetwork,'modelFrontline'=>$modelFrontline,'modelOs'=>$modelOs,'modelLguServer'=>$modelLguServer,'modelHardwarePeripherals'=>$modelHardwarePeripherals,'modelComputingDevice'=>$modelComputingDevice,'modelLguCourse'=>$modelLguCourse,'modelLguOffice'=>$modelLguOffice,'modelLguPosition'=>$modelLguPosition,'modelLguEmployee'=>$modelLguEmployee,'municipalityCity'=>$municipalityCity,'step'=>$step,'modelContactPartOne'=>$modelContactPartOne,'modelContactParttwo'=>$modelContactParttwo]);
      }
    }

    public function actionFinalizedsurvey()
    {

      $lguProfile = LguProfile::findOne(['Id'=>$_POST['id']]);

      $lguProfile['isFinalized'] = 1;
      $lguProfile['DateComplete'] = date("Y-m-d H:i:s");
      $lguProfile->save();

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $modelUser = User::find()->where('BINARY [[username]]=:username', ['username'=>$model['username']])->one();

            if(!$modelUser){

              $this->goBack();
            }
            // else if($mode){
            // $modelUser['isLogin'] = 1;
            // echo "<pre>";
            // print_r($modelUser);
            // echo "</pre>";
            // //exit;
            // $modelUser->save();
            // return $this->goBack();
            // }
            else{

              $modelUser['isLogin'] = 1;
              $lguProfile = LguProfile::findOne(['Id'=>$modelUser['LguProfileId']]);
              $lguProfile['DateOpen'] = date("Y-m-d H:i:s");
              $lguProfile->save();
              // echo "<pre>";
              // print_r($modelUser);
              // echo "</pre>";
              //exit;
              $modelUser->save();
              return $this->goBack();
              }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {

        $modelUser = User::findOne(['Username'=>Yii::$app->user->identity->Username]);
        $modelUser['isLogin'] = 0;
        $modelUser->save();
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
