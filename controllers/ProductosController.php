<?php

namespace app\controllers;

use Yii;
use app\models\Productos;
use app\models\ProductosSearh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\controllers\URLFriendly;

class ProductosController extends Controller
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


    public function actionIndex() {
       
        $searchModel = new ProductosSearh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate() {
        $model = new Productos();
        $themeBasePath = Yii::getAlias('@app/themes/nexttouch');

        if(isset($_POST["Productos"])){

            $model->attributes = $_POST ['Productos'];

            date_default_timezone_set("america/caracas");
            $now_time_UTC = date("Y-m-d H:i:s");
            $model->producto_fecha_creacion = $now_time_UTC;
            $model->usuario_id = Yii::$app->user->identity->usuario_id;
            $model->categoria_id =  $model->subcategoria->categoria_id;

            $rnd1 = rand(0,999).rand(0,999);
            $rnd2 = rand(0,999).rand(0,999);
            $rnd3 = rand(0,999).rand(0,999);
            $rnd4 = rand(0,999).rand(0,999);
            $rnd5 = rand(0,999).rand(0,999);          
                            
            $uploadedFile1=UploadedFile::getInstance($model,'producto_imagen_pequeno');
            
            if(!empty($uploadedFile1)) {
                $fileName1 = "$rnd1.jpg";  // random number + file name
                $model->producto_imagen_pequeno = $fileName1;
                $path1 = $themeBasePath.'/resources/images/productos/'.$fileName1;
            }

             $uploadedFile2=UploadedFile::getInstance($model,'producto_imagen_grande_1');
            
            if(!empty($uploadedFile2)) {
                $fileName2 = "$rnd2.jpg";  // random number + file name
                $model->producto_imagen_grande_1 = $fileName2;
                $path2 = $themeBasePath.'/resources/images/productos/'.$fileName2;
            }

            $uploadedFile3=UploadedFile::getInstance($model,'producto_imagen_grande_2');

            if(!empty($uploadedFile3)) {
                $fileName3 = "$rnd3.jpg";  // random number + file name
                $model->producto_imagen_grande_2 = $fileName3;
                $path3 = $themeBasePath.'/resources/images/productos/'.$fileName3;
            }

            $uploadedFile4=UploadedFile::getInstance($model,'producto_imagen_grande_3');
            
            if(!empty($uploadedFile4)) {
                $fileName4 = "$rnd4.jpg";  // random number + file name
                $model->producto_imagen_grande_3 = $fileName4;
                $path4 = $themeBasePath.'/resources/images/productos/'.$fileName4;
            }


             $uploadedFile5=UploadedFile::getInstance($model,'producto_imagen_grande_4');
            
            if(!empty($uploadedFile5)) {
                $fileName5 = "$rnd5.jpg";  // random number + file name
                $model->producto_imagen_grande_4 = $fileName5;
                $path5 = $themeBasePath.'/resources/images/productos/'.$fileName5;
            }

            if(!empty($model->producto_idioma)){

                /* le agrega el sufijo delante con 0 ceros */
                $arrayIdiomas = array();
                foreach($model->producto_idioma as $keyModelIdioma => $valModelIdioma){
                    array_push($arrayIdiomas, str_pad($valModelIdioma, 5, "0", STR_PAD_LEFT));
                }
                $model->producto_idioma = implode(",", $arrayIdiomas);
                
            }

            if(!empty($model->producto_color)){
                /* le agrega el sufijo delante con 0 ceros */
                $arrayColor = array();
                foreach($model->producto_color as $keyModelColor => $valModelColor){
                    array_push($arrayColor, str_pad($valModelColor, 5, "0", STR_PAD_LEFT));
                }
                $model->producto_color = implode(",", $arrayColor);
            }

            $URLFriendly = new URLFriendly();
            $model->producto_http = $URLFriendly->_new($model->producto_titulo);

            if($model->save()){

                if(!empty($uploadedFile1)){
                    $uploadedFile1->saveAs($path1);
                }

                if(!empty($uploadedFile2)){
                    $uploadedFile2->saveAs($path2);
                }

                if(!empty($uploadedFile3)){
                    $uploadedFile3->saveAs($path3);
                }

                if(!empty($uploadedFile4)){
                    $uploadedFile4->saveAs($path4);
                }

                if(!empty($uploadedFile5)){
                    $uploadedFile5->saveAs($path5);
                }
                           
                Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Exito");
    
                return $this->redirect(['create']);

            } else {
                var_dump($model->errors);die();
            }   


        }

        return $this->render('create', [
                'model' => $model,
        ]);
        
    }


    public function actionUpdate($id) {

        $model = $this->findModel($id);
        $imagen1 = $model->producto_imagen_pequeno;
        $imagen2 = $model->producto_imagen_grande_1;
        $imagen3 = $model->producto_imagen_grande_2;
        $imagen4 = $model->producto_imagen_grande_3;
        $imagen5 = $model->producto_imagen_grande_4;

        $themeBasePath = Yii::getAlias('@app/themes/nexttouch');

        if(isset($_POST["Productos"])){

            $model->attributes = $_POST ['Productos'];

            date_default_timezone_set("america/caracas");
            $now_time_UTC = date("Y-m-d H:i:s");
            $model->producto_fecha_creacion = $now_time_UTC;
            $model->usuario_id = Yii::$app->user->identity->usuario_id;
            $model->categoria_id =  $model->subcategoria->categoria_id;
            $model->producto_status =  "Nuevo";

            $rnd1 = rand(0,999).rand(0,999);
            $rnd2 = rand(0,999).rand(0,999);
            $rnd3 = rand(0,999).rand(0,999);
            $rnd4 = rand(0,999).rand(0,999);
            $rnd5 = rand(0,999).rand(0,999);          
                
            $uploadedFile1=UploadedFile::getInstance($model,'producto_imagen_pequeno');
            
            if(!empty($uploadedFile1)) {
                $fileName1 = "$rnd1.jpg";  // random number + file name
                $model->producto_imagen_pequeno = $fileName1;
                $path1 = $themeBasePath.'/resources/images/productos/'.$fileName1;
            } else {
                $model->producto_imagen_pequeno = $imagen1;
            }

            $uploadedFile2=UploadedFile::getInstance($model,'producto_imagen_grande_1');
            
            if(!empty($uploadedFile2)) {
                $fileName2 = "$rnd2.jpg";  // random number + file name
                $model->producto_imagen_grande_1 = $fileName2;
                $path2 = $themeBasePath.'/resources/images/productos/'.$fileName2;
            } else {
                $model->producto_imagen_grande_1 = $imagen2;
            }

            $uploadedFile3=UploadedFile::getInstance($model,'producto_imagen_grande_2');
            
            if(!empty($uploadedFile3)) {
                $fileName3 = "$rnd3.jpg";  // random number + file name
                $model->producto_imagen_grande_2 = $fileName3;
                $path3 = $themeBasePath.'/resources/images/productos/'.$fileName3;
            } else {
                $model->producto_imagen_grande_2 = $imagen3;
            }  

            $uploadedFile4=UploadedFile::getInstance($model,'producto_imagen_grande_3');
            
            if(!empty($uploadedFile4)) {
                $fileName4 = "$rnd4.jpg";  // random number + file name
                $model->producto_imagen_grande_3 = $fileName4;
                $path4 = $themeBasePath.'/resources/images/productos/'.$fileName4;
            }  else {
                $model->producto_imagen_grande_3 = $imagen4;
            }  

             $uploadedFile5=UploadedFile::getInstance($model,'producto_imagen_grande_4');
            
            if(!empty($uploadedFile5)) {
                $fileName5 = "$rnd5.jpg";  // random number + file name
                $model->producto_imagen_grande_4 = $fileName5;
                $path5 = $themeBasePath.'/resources/images/productos/'.$fileName5;

            }   else {
                $model->producto_imagen_grande_4 = $imagen5;
            }  

            if(!empty($model->producto_idioma)){

                /* le agrega el sufijo delante con 0 ceros */
                $arrayIdiomas = array();
                foreach($model->producto_idioma as $keyModelIdioma => $valModelIdioma){
                    array_push($arrayIdiomas, str_pad($valModelIdioma, 5, "0", STR_PAD_LEFT));
                }
                $model->producto_idioma = implode(",", $arrayIdiomas);
                
            }

            if(!empty($model->producto_color)){
                /* le agrega el sufijo delante con 0 ceros */
                $arrayColor = array();
                foreach($model->producto_color as $keyModelColor => $valModelColor){
                    array_push($arrayColor, str_pad($valModelColor, 5, "0", STR_PAD_LEFT));
                }
                $model->producto_color = implode(",", $arrayColor);
            }

            $URLFriendly = new URLFriendly();
            $model->producto_http = $URLFriendly->_new($model->producto_titulo);

            if($model->save()){

                if(!empty($uploadedFile1)){
                    $uploadedFile1->saveAs($path1);
                }

                if(!empty($uploadedFile2)){
                    $uploadedFile2->saveAs($path2);
                }

                if(!empty($uploadedFile3)){
                    $uploadedFile3->saveAs($path3);
                }

                if(!empty($uploadedFile4)){
                    $uploadedFile4->saveAs($path4);
                }

                if(!empty($uploadedFile5)){
                    $uploadedFile5->saveAs($path5);
                }
                           
                Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Exito");
    
                return $this->redirect(['update', 'id' => $model->producto_id]);

            } else {
                var_dump($model->errors);die();
            }   

        }

        return $this->render('update', [
                'model' => $model,
        ]);
        
    }

    public function actionDelete($id) {
        
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Eliminado");
        return $this->redirect(['index']);
    }

  
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}