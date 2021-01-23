<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
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
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuarios();

           if (isset ( $_POST ['Usuarios'] )) {

          $model->attributes = $_REQUEST["Usuarios"];
          
          date_default_timezone_set("UTC");
          $now_time_UTC = date("Y-m-d H:i:s", time());
          $model->usuario_fecha_creacion = $now_time_UTC;
          $model->usuario_fecha_modificacion = $now_time_UTC;
          
          $password = $model->usuario_correo;
          $model->usuario_perfil = "estudiante";
          $model->usuario_clave = md5($password);
          $model->instituto_id = Yii::$app->user->identity->instituto_id;
          $model->usuario_correo_confirmacion = $model->usuario_correo; 
          $model->usuario_clave_confirmacion = $model->usuario_clave;
         


          $model->usuario_fecha_nacimiento = date('Y-m-d', strtotime($model->usuario_fecha_nacimiento));
                    
                    if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Estudiante agregado");
                    
                    return $this->redirect(['create']);
                    }
                    }
            return $this->render('create', [
                'model' => $model,
            ]);
        
    }

      public function actionCreateadmin()
    {
        $model = new Usuarios();
       

           if (isset ( $_POST ['Usuarios'] )) {

          $model->attributes = $_POST["Usuarios"];
          
          date_default_timezone_set("UTC");
          $now_time_UTC = date("Y-m-d H:i:s", time());
          $model->usuario_fecha_creacion = $now_time_UTC;
          $model->usuario_fecha_modificacion = $now_time_UTC;
          $model->usuario_perfil = "registrador";
          $model->usuario_clave = md5($model->usuario_clave);
          $model->usuario_clave_confirmacion = md5($model->usuario_clave_confirmacion);
          $model->instituto_id = Yii::$app->user->identity->instituto_id;     


          $model->usuario_fecha_nacimiento = date('Y-m-d', strtotime($model->usuario_fecha_nacimiento));
                    
                    if ($model->save ()){
                    $model = new Usuarios();
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Agregado");
                    
                        return $this->render('miusuario', [
                'model' => $model,
            ]);
                    }
                    }
            return $this->render('miusuario', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

                if (isset ( $_POST ['Usuarios'] )) {

          $model->attributes = $_POST["Usuarios"];
          
          date_default_timezone_set("UTC");
          $now_time_UTC = date("Y-m-d H:i:s", time());
          $model->usuario_fecha_modificacion = $now_time_UTC;  
           $password = $model->usuario_correo;
          $model->usuario_clave = md5($password); 
          $model->usuario_correo_confirmacion = $model->usuario_correo; 
          $model->usuario_clave_confirmacion = $model->usuario_clave; 


                    
                    if ($model->save ()){
        
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Actualizado");
                    
                        return $this->render('update', [
                'model' => $model,
            ]);
                    } else {
                var_dump($model->errors);die();
                    }
                    } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     public function actionMiusuario($id)
    {
        $model = $this->findModel($id);


      if (isset ( $_POST ['Usuarios'] )) {

          $model->attributes = $_REQUEST["Usuarios"];
          
          date_default_timezone_set("UTC");
          $now_time_UTC = date("Y-m-d H:i:s", time());
          $model->usuario_fecha_modificacion = $now_time_UTC;
          
          $model->usuario_clave = md5($model->usuario_clave);
          $model->usuario_clave_confirmacion = md5($model->usuario_clave_confirmacion);
         
                   
                    if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Actualizado");
                    
                     return $this->render('miusuario', [
                'model' => $model,
            ]);
                    } else {
                        var_dump($_POST);
                                die();
                    }
                    }else {
            return $this->render('miusuario', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuarios model.
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
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
