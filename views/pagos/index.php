<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Usuarios;
use app\models\Pagos;
use app\models\PagosSearch;

 $modelestudiante = Usuarios::find()->where(['usuario_id' => $_REQUEST['id']])->one();

$this->title = 'Estudiante: '.$modelestudiante->usuario_nombre." ".$modelestudiante->usuario_apellido ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-body">

    <h3><?= Html::encode($this->title) ?></h3>
  
    <p>
        <?= Html::a('Agregar pago', ['create?id='.$_REQUEST['id']], ['class' => 'btn btn-success']) ?>
    </p>

<?php 

     $modelperiodoEscolares = Pagos::find()->where("estudiante_id =".$_REQUEST['id']." GROUP BY periodo_escolar_id ORDER BY periodo_escolar_id")->all();


     foreach($modelperiodoEscolares as $key => $val) {

       $fecha = "desde ".date('d-m-Y',strtotime($val->periodoEscolar->periodo_escolar_fecha_desde))." hasta ".date('d-m-Y',strtotime($val->periodoEscolar->periodo_escolar_fecha_hasta));
       
        $searchModel = new PagosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['estudiante_id'=>$_REQUEST['id']])->andFilterWhere(['periodo_escolar_id'=>$val->periodo_escolar_id])->orderBy(['pago_educacion_id' => SORT_DESC]);

        $matriculaTotal = 0;
        $mensualidadTotal = 0; 
        $modelppago = Pagos::find()->where("estudiante_id =".$_REQUEST['id']." AND periodo_escolar_id=" .$val->periodo_escolar_id)->all();

        foreach($modelppago as $keytotal => $valtotal) {

          if($valtotal->tipo_pago_id==1){

             $matriculaTotal = $matriculaTotal + $valtotal->pago_monto;
          } else {

            $mensualidadTotal =  $mensualidadTotal + $valtotal->pago_monto;
          }


        
        }
?>
<div class="" style=""> 
  <hr>
  <h3> Periodo escolar: <?php print $fecha;   ?></h3>

</div>
        <div class="">
   <?php
   print "<strong>Costo total de matrícula: </strong>".$val->periodoEscolar->periodo_escolar_monto_matricula;
   ?>
   </div>
   <div class="">
   <?php
   print "<strong>Pago de matrícula realizado por el estudiante: </strong>".$matriculaTotal;
   ?>
   </div>
     <div class="">
   <?php
   print "<strong>Costo total de mensualidad: </strong>".$val->periodoEscolar->periodo_escolar_monto_mensualidad;
   ?>
   </div>
     <div class="" style="margin-bottom: -9px">
   <?php
   print "<strong>Pago de mensualidad realizado por el estudiante: </strong>".$mensualidadTotal;
   ?>
   </div>
   <br>

<?php
   print GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pago_monto',
                    [
            'header' => 'Representante',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return "<strong>Nombre: </strong> ".$data->pago_representante_nombre." ".$data->pago_representante_apellido."<br> <strong>Cédula: </strong>".$data->pago_representante_cedula;

            }
          ],
          'formaPago.forma_pago_nombre',
          //'tipoPago.tipo_pago_nombre',
                    [
            'header' => 'Motivo de pago',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return $data->tipoPago->tipo_pago_nombre."<br>".$data->pago_mensualidad_mes;

            }
          ],
                    [
            'header' => 'Fecha de pago',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return date('d-m-Y h:i:s a',strtotime($data->pago_fecha_creacion));

            }
          ],
           
            [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => ' {update} {delete}  {imprimir}',
                            'buttons' => ['imprimir' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-file"></span>', ['pagos/pdf?id='.$model->pago_educacion_id], ['title' => 'Imprimir comprobante', ])  ;  }],
                   'header' => 'Opciones',
                   'visible' => (Yii::$app->user->identity->usuario_perfil=='administrador'),
                   'options' => ['width' => '120'],
                        ],

                          [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => ' {update} {imprimir}',
                            'buttons' => ['imprimir' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-file"></span>', ['pagos/pdf?id='.$model->pago_educacion_id], ['title' => 'Imprimir comprobante', ])  ;  }],
                   'header' => 'Opciones',
                   'visible' => (Yii::$app->user->identity->usuario_perfil=='registrador'),
                   'options' => ['width' => '120'],
                        ],
        ],
    ]);

 }
     ?>
</div>
</div>
