<?php

namespace app\controllers;

use Yii;
use app\models\FormasPagos;
use app\models\FormasPagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormasPagosController implements the CRUD actions for FormasPagos model.
 */
class FormaspagosController extends Controller
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
     * Lists all FormasPagos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormasPagosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormasPagos model.
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
     * Creates a new FormasPagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormasPagos();

         if (isset ( $_POST ['FormasPagos'] )) {

            $model->attributes = $_REQUEST["FormasPagos"];

             if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Guardado");
                    $model = new FormasPagos();
                    
                     return $this->render('create', ['model' => $model,
                            ]);
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
     * Updates an existing FormasPagos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

            if (isset ( $_POST ['FormasPagos'] )) {

            $model->attributes = $_REQUEST["FormasPagos"];

             if ($model->save ()){
                    
                    Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span>Actualizado");
                    
                     return $this->render('update', [
                'model' => $model,
            ]);
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

    /**
     * Deletes an existing FormasPagos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
          $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "<span class='fa fa-check'></span> Eliminado");
        return $this->redirect(['index']);

    }

    /**
     * Finds the FormasPagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormasPagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormasPagos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
