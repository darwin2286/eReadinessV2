<?php

namespace app\controllers;

use Yii;
use app\models\Coaches;
use app\models\CoachesSearch;
use app\models\Cluster;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\User;
/**
 * CoachesController implements the CRUD actions for Coaches model.
 */
class CoachesController extends Controller
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
     * Lists all Coaches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoachesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coaches model.
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
     * Creates a new Coaches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coaches();
        $item = ArrayHelper::map(Cluster::find()->all(),'Id','ClusterCode');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/index.php/library/index']);
        }

        return $this->render('create', [
            'model' => $model,'item'=>$item
        ]);
    }

    /**
     * Updates an existing Coaches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $item = ArrayHelper::map(Cluster::find()->all(),'Id','ClusterCode');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/index.php/library/index']);
        }

        return $this->render('update', [
            'model' => $model,'item'=>$item
        ]);
    }

    /**
     * Deletes an existing Coaches model.
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

    /**
     * Finds the Coaches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coaches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coaches::findOne(['Uuid'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
