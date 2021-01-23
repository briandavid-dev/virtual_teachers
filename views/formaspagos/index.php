<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Formas de  pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-body">
                  <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <?= Yii::$app->session->getFlash('success') ?>
      </div>
  <?php endif; ?>
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'forma_pago_nombre:ntext',

               [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => ' {update} {delete} ',

                   'header' => 'Acciones',
                   'visible' => (Yii::$app->user->identity->usuario_perfil=='administrador'),
                   'options' => ['width' => '120'],
                        ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
