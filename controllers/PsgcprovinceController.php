<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Psgcmunicipalitycity;
use app\models\PsgcprovinceSearch;
use app\models\User;
use thamtech\uuid\helpers\UuidHelper;


/**
 * PsgcprovinceController implements the CRUD actions for Psgcprovince model.
 */
class PsgcprovinceController extends Controller
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
    public function actionLogout()
    {
      
        $modelUser = User::findOne(['Username'=>Yii::$app->user->identity->Username]);
        $modelUser['isLogin'] = 0;
        $modelUser->save();
        Yii::$app->user->logout();
        return $this->goHome();
    }
    /**
     * Lists all Psgcprovince models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PsgcprovinceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Psgcprovince model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Psgcprovince model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Psgcprovince();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Psgcprovince model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Psgcprovince model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    

    // public function actionLists($id){

    //     $countMunicipality = Psgcmunicipalitycity::find()
    //                         ->where(['ProvinceId' => $id])
    //                         ->count();

    //     $Municipality = Psgcmunicipalitycity::find()
    //                 ->where(['ProvinceId'=> $id])
    //                 ->all();

    //     if($countMunicipality > 0){
    //         foreach($Municipality as $Municipal){
    //             echo "<option value='".$Municipal->Id."'>".$Municipal->MunicipalityCityName."</option>";
    //         }
    //     }else{

    //         echo "<option> - </option>";
    //     }
    // }

    /**
     * Finds the Psgcprovince model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Psgcprovince the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Psgcprovince::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
