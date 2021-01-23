<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Periodos Escolares';
$this->params['breadcrumbs'][] = $this->title;
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

<?php 

    $dataProvider->query->andFilterWhere(['instituto_id'=>Yii::$app->user->identity->instituto_id])->orderBy(['periodo_escolar_id' => SORT_DESC]);
?>
    <p>
        <?= Html::a('Crear periodo escolar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'header' => 'Fecha desde',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return date('d-m-Y',strtotime($data->periodo_escolar_fecha_desde));

            }
          ],

            [
            'header' => 'Fecha hasta',
            'format'=>'raw',
            'value'=> function($data){
           
            
              return date('d-m-Y',strtotime($data->periodo_escolar_fecha_hasta));

            }
          ],

            'periodo_escolar_monto_matricula',
            'periodo_escolar_monto_mensualidad',

                              [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => '{delete} ',
                            'buttons' => ['pagar' => function ($url, $model) {

  return   Html::a('<span class="glyphicon glyphicon-usd"></span>', ['pagos/create?id='.$model->periodo_escolar_fecha_hasta], ['title' => 'Pagos del periodo', ])  ;  }],
                   'header' => 'Acciones',
                   'visible' => (Yii::$app->user->identity->usuario_perfil=='administrador'),
                   'options' => ['width' => '120'],
                        ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>
</div>
