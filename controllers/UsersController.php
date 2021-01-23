<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UsersController extends Controller
{
     public $layout = 'panel';
 
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


    public function actionIndex() {
        
        $searchModel = new UsersSearh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        
        $model = new Users();

       if (isset ( $_POST ['Users'] )) {

          $model->attributes = $_REQUEST["Users"];
          $model->usuario_login = $model->usuario_email;
          $model->usuario_activo =="1";
          date_default_timezone_set("UTC");
          $now_time_UTC = date("Y-m-d H:i:s", time());
          $model->usuario_fecha_creacion = $now_time_UTC;
          $model->usuario_fecha_modificacion = $now_time_UTC;
          $password = $model->usuario_password;

            if ($model->validate ()){
            $model->usuario_password = md5($model->usuario_password).md5($model->usuario_password);
        
            } else {
            $model->usuario_password = $model->usuario_password;
            }

          $model->usuario_fecha_nacimiento = date('Y-m-d', strtotime($model->usuario_fecha_nacimiento));
                    
                    if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Usuario Guardado");
                    
                    return $this->redirect(['create']);
                   
                }
                }
                    return $this->render('create', [
                    'model' => $model,
                    ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $usuario = 'administrador';

        if (isset ( $_POST ['Users'] )) {
            $model->attributes = $_REQUEST["Users"];
            $model->usuario_login = $model->usuario_email;

            date_default_timezone_set("UTC");
            $now_time_UTC = date("Y-m-d H:i:s", time());
            $model->usuario_fecha_creacion = $now_time_UTC;
            $model->usuario_fecha_modificacion = $now_time_UTC;

            $password = $model->usuario_password;

            if ($model->validate ()){
                $model->usuario_password = md5($model->usuario_password).md5($model->usuario_password);
            } else {
                $model->usuario_password = $model->usuario_password;
            }

            $model->usuario_fecha_nacimiento = date('Y-m-d', strtotime($model->usuario_fecha_nacimiento));

                    if ($model->save ()){

                                Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Usuario Actualizado!");

                                return $this->render('update', [
                                'model' => $model, 'usuario' => $usuario 
                                ]);
                                }

                                }
                                return $this->render('update', [
                                'model' => $model,'usuario' => $usuario
                                ]);
    }

    public function actionDelete($id) {
       try {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "<span class ='fa fa-check'></span> Usuario Eiminado!");

        } catch(\Exception $e){

        Yii::$app->session->setFlash('exception', "<span class='fa fa-exclamation-triangle '></span> No se puede eliminar el registro. Está asociado a otra tabla de la Base de Datos.");
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionEditable($usuarios) {
        
        $activo = $_REQUEST["Users"]["usuario_activo"];
        
        if (isset($_POST['hasEditable'])) {
            
            /* actualiza el EQUIPO asignado de la cita */
            $modelUsuarios = Users::findOne($usuarios);
            $modelUsuarios->usuario_activo = "$activo";

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            if($modelUsuarios->save()){
                $activo = ($activo) ? "ACTIVO" : "INACTIVO";
                return ['output'=>$activo, 'message'=>''];
            } else {
               var_dump($modelUsuarios->getErrors());
              }
        }
    }


}
