<?php

namespace app\controllers;

use Yii;
use app\models\PeriodosEscolares;
use app\models\PeriodosEscolaresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeriodosEscolaresController implements the CRUD actions for PeriodosEscolares model.
 */
class PeriodosescolaresController extends Controller
{
    public $layout = 'panel';
    /**
     * @inheritdoc
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
     * Lists all PeriodosEscolares models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeriodosEscolaresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PeriodosEscolares model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PeriodosEscolares model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PeriodosEscolares();

        if(isset($_POST["PeriodosEscolares"])){

            $model->attributes = $_POST ['PeriodosEscolares'];
            $model->instituto_id = Yii::$app->user->identity->instituto_id;
            $model->periodo_escolar_fecha_desde = date('Y-m-d', strtotime($model->periodo_escolar_fecha_desde));
            $model->periodo_escolar_fecha_hasta = date('Y-m-d', strtotime($model->periodo_escolar_fecha_hasta));

                if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Guardado");
                    
                    return $this->redirect(['create']);
                    } else {
                        
                        var_dump($modelUsuarios->getErrors());
                        die();

                    }

          
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PeriodosEscolares model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->periodo_escolar_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PeriodosEscolares model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "<span class ='fa fa-check'></span>Eiminado!");

        } catch(\Exception $e){
        Yii::$app->session->setFlash('exception', "<span class='fa fa-exclamation-triangle '></span> No se puede eliminar el registro. Está asociado a otra tabla de la Base de Datos.");
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the PeriodosEscolares model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PeriodosEscolares the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PeriodosEscolares::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
