<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Estudiantes';

?>

<div class="box box-info">
    <div class="box-body">

            <?php if(Yii::$app->session->hasFlash('exception')): ?>
              <div class="alert alert-danger alert-dismissable">
                <?php echo Yii::$app->session->getFlash('exception'); ?>
              </div>
            <?php endif; ?>

          <?php if (Yii::$app->session->hasFlash('success')): ?>
              <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <?= Yii::$app->session->getFlash('success') ?>
              </div>
          <?php endif; ?>


<?php Pjax::begin(); ?> 
<?php 
  if($_REQUEST['id']=="admin") {
    ?>
        <p>
        <?= Html::a('Agregar usuario registrador', ['createadmin'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
    $dataProvider->query->Where("usuario_perfil != 'estudiante'")->andFilterWhere(['instituto_id'=>Yii::$app->user->identity->instituto_id])->orderBy(['usuario_id' => SORT_DESC]);

   print GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuario_nombre',
            'usuario_apellido',
            'usuario_correo',
            'usuario_perfil',

                    [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => '{update}',
                   'header' => 'Opciones',
                   'buttons' => ['update' => function ($url, $model) {

                     return   Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['usuarios/miusuario?id='.$model->usuario_id], ['title' => 'Actualizar', ])  ;  },
                   ],
                   'visible' => (Yii::$app->user->identity->usuario_perfil=='administrador'),
                   'options' => ['width' => '120'],
                    ],
        ],
    ]);


  } else {

        ?>
        <p>
        <?= Html::a('Agregar estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
$dataProvider->query->andFilterWhere(['usuario_perfil'=>$_REQUEST['id']])->andFilterWhere(['instituto_id'=>Yii::$app->user->identity->instituto_id])->orderBy(['usuario_id' => SORT_DESC]);

print GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        [
            'header' => 'Datos del estudiante',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return $data->usuario_nombre." ".$data->usuario_apellido;

            }
          ],
            'usuario_correo',
            'usuario_cedula',
           

            

                    [
                   'class' => 'yii\grid\ActionColumn',
                        'template' => '{pagar} {periodosescolares} {update}',
                                'header' => 'Opciones',
                        'buttons' => ['pagar' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-usd"></span>', ['pagos/create?id='.$model->usuario_id], ['title' => 'Pagar', ])  ;  },
        
        'periodosescolares' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-calendar"></span>', ['pagos/index?id='.$model->usuario_id], ['title' => 'Control de pagos', ])  ;  }],



                                'visible' => (Yii::$app->user->identity->usuario_perfil=='administrador'),
                                'options' => ['width' => '120'],
                        ],

                                 [
                   'class' => 'yii\grid\ActionColumn',
                        'template' => '{pagar} {periodosescolares} {update}',
                                'header' => 'Opciones',
                        'buttons' => ['pagar' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-usd"></span>', ['pagos/create?id='.$model->usuario_id], ['title' => 'Pagar', ])  ;  },
        
        'periodosescolares' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-calendar"></span>', ['pagos/index?id='.$model->usuario_id], ['title' => 'Control de pagos', ])  ;  }],



                                'visible' => (Yii::$app->user->identity->usuario_perfil=='registrador'),
                                'options' => ['width' => '120'],
                        ],
        ],
    ]);

  }
?>

  
  
<?php Pjax::end(); ?>
</div>
</div>
