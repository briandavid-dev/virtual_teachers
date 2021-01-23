<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\controllers\URLFriendly;
use yii\helpers\html; 
use app\controllers\Funcion;

class SiteController extends Controller
{

  
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

   
    public function actionIndex() {
      
    $model = new LoginForm();
     $this->layout= "educacionvirtual";

      
      if(!Yii::$app->user->isGuest) {

                    if (Yii::$app->user->identity->usuario_perfil == "administrador") {   
                     return $this->redirect(['/usuarios/index?id=estudiante']);
                    } else if  (Yii::$app->user->identity->usuario_perfil == "registrador"){
                       return $this->redirect(['/usuarios/index?id=estudiante']);

                      } else {
                        
                      }
      
     
       
    }
    

           return $this->render('login',['model'=>$model]);
   
 }
  
    public function actionLogout() {
      
      Yii::$app->user->logout();
      return $this->goHome();
    
    }
    
    public function actionUrlmanage($http) {
          
    
        switch($http){
          
  
          case 'logout':
  Yii::$app->user->logout();
      return $this->goHome();

                break;

            

case 'login':
   $model = new LoginForm();
      $this->layout= "educacionvirtual";

         if(isset($_POST["pass"])){
        $model->password = $_POST["pass"];
        $model->username =$_POST["correo"];


                          if ($model->login()) {

                if (Yii::$app->user->identity->usuario_perfil == "administrador") {   
                     return $this->redirect(['/usuarios/index?id=estudiante']);
                    } else if  (Yii::$app->user->identity->usuario_perfil == "registrador"){
                       return $this->redirect(['/usuarios/index?id=estudiante']);

                      } else {
                         Yii::$app->user->logout();
                         return $this->goHome();
                        
                      }
              
                } else {
                  Yii::$app->session->setFlash('success', "<span class='fa fa-danger'></span> Correo o clave incorrecta");


                }
     


          }
     
     

           return $this->render('login',['model'=>$model]);
  break;


  
                }
              }

            }
            




 ?>
