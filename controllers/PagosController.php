<?php

namespace app\controllers;

use Yii;
use app\models\Pagos;
use app\models\PagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagosController implements the CRUD actions for Pagos model.
 */
class PagosController extends Controller
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
     * Lists all Pagos models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Displays a single Pagos model.
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
     * Creates a new Pagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed 
     */
    public function actionCreate()
    {
        $model = new Pagos();

         if (isset ( $_POST ['Pagos'] )) {

            $model->attributes = $_REQUEST["Pagos"];
             date_default_timezone_set("UTC");
            $now_time_UTC = date("Y-m-d H:i:s", time());
            $model->pago_fecha_creacion = $now_time_UTC;
            $model->estudiante_id = $_REQUEST['id'];

             if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Pago Guardado");
                    
                    //return $this->redirect(['create']);
                    return $this->redirect(['usuarios/index?id=estudiante']);
                    } else {

                        var_dump(13);
                        die();
                    }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pagos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       if (isset ( $_POST ['Pagos'] )) {

        if(!isset($__POST['Pagos']['pago_mensualidad_mes'])){

                $model->pago_mensualidad_mes = "";
        }

            $model->attributes = $_REQUEST["Pagos"];
             date_default_timezone_set("UTC");
            $now_time_UTC = date("Y-m-d H:i:s", time());
            $model->pago_fecha_creacion = $now_time_UTC;

             if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Actualizado");
                    
                    //return $this->redirect(['create']);
                    return $this->redirect(['usuarios/index?id=estudiante']);
                    } else {

                        var_dump(13);
                        die();
                    }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

  public function actionPdf()
    {

       $model = $this->findModel($_REQUEST['id']);

       
            return $this->render('pdf', [
                'model' => $model,
   
            ]);
        
    }
    /**
     * Deletes an existing Pagos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
