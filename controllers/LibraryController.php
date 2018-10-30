<?php

namespace app\controllers;

use Yii;
use app\models\LceTerm;
use app\models\LceTermSearch;
use app\models\IncomeClass;
use app\models\IncomeClassSearch;
use app\models\EmploymentStatus;
use app\models\EmploymentStatusSearch;
use app\models\EmployeePosition;
use app\models\EmployeePositionSearch;
use app\models\ClusterSearch;
use app\models\CoachesSearch;
use app\models\Course;
use app\models\CourseSearch;
use app\models\SoftwareOs;
use app\models\SoftwareOsSearch;
use app\models\FrontlineService;
use app\models\FrontlineServiceSearch;
use app\models\Coaches;
use app\models\Cluster;
use app\models\User;
use app\models\SurveyContactPerson;
use app\models\SurveyContactPersonSearch;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LceTermController implements the CRUD actions for LceTerm model.
 */
class LibraryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LceTerm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LceTermSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchIncomeClass = new IncomeClassSearch();
        $dataProviderIncomeClass = $searchIncomeClass->search(Yii::$app->request->queryParams);

        $searchEmploymentStatus = new EmploymentStatusSearch();
        $dataProviderEmploymentStatus = $searchEmploymentStatus->search(Yii::$app->request->queryParams);

        $searchEmployeePosition = new EmployeePositionSearch();
        $dataProviderEmployeePosition = $searchEmployeePosition->search(Yii::$app->request->queryParams);

        $searchCourse = new CourseSearch();
        $dataProviderCourse = $searchCourse->search(Yii::$app->request->queryParams);

        $searchSoftwareOs = new SoftwareOsSearch();
        $dataProviderSoftwareOs= $searchSoftwareOs->search(Yii::$app->request->queryParams);

        $searchFrontlineService= new FrontlineServiceSearch();
        $dataProviderFrontlineService= $searchFrontlineService->search(Yii::$app->request->queryParams);

        $searchCoaches= new CoachesSearch();
        $dataProviderCoaches= $searchCoaches->search(Yii::$app->request->queryParams);

        $searchCluster= new ClusterSearch();
        $dataProviderCluster= $searchCluster->search(Yii::$app->request->queryParams);

        $searchUser= new UserSearch();
        $dataProviderUser= $searchUser->search(Yii::$app->request->queryParams);

        $searchContactPerson= new SurveyContactPersonSearch();
        $dataProviderSurveyContactPerson= $searchContactPerson->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchIncomeClass'=>$searchIncomeClass,
            'dataProviderIncomeClass'=>$dataProviderIncomeClass,
            'searchEmploymentStatus'=>$searchEmploymentStatus,
            'dataProviderEmploymentStatus'=>$dataProviderEmploymentStatus,
            'searchEmployeePosition'=>$searchEmployeePosition,
            'dataProviderEmployeePosition'=>$dataProviderEmployeePosition,
            'searchCourse'=>$searchCourse,
            'dataProviderCourse'=>$dataProviderCourse,
            'searchSoftwareOs'=>$searchSoftwareOs,
            'dataProviderSoftwareOs'=>$dataProviderSoftwareOs,
            'searchFrontlineService'=>$searchFrontlineService,
            'dataProviderFrontlineService'=>$dataProviderFrontlineService,
            'searchCoaches'=>$searchCoaches,
            'dataProviderCoaches'=>$dataProviderCoaches,
            'searchCluster'=>$searchCluster,
            'dataProviderCluster'=>$dataProviderCluster,
            'searchUser'=>$searchUser,
            'dataProviderUser'=>$dataProviderUser,
            'searchContactPerson'=>$searchContactPerson,
            'dataProviderSurveyContactPerson'=>$dataProviderSurveyContactPerson
        ]);
    }


    /**
     * Finds the LceTerm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LceTerm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LceTerm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionLogout()
    {
      
        $modelUser = User::findOne(['Username'=>Yii::$app->user->identity->Username]);
        $modelUser['isLogin'] = 0;
        $modelUser->save();
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
