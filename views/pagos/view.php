<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */

$this->title = $model->pago_educacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pago_educacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pago_educacion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pago_educacion_id',
            'pago_fecha_creacion',
            'pago_monto',
            'periodo_escolar_id',
            'forma_pago_id',
            'estudiante_id',
            'pago_representante_nombre',
            'pago_representante_apellido',
            'pago_representante_cedula',
            'pago_representante_parentesco',
            'tipo_pago_id',
            'pago_detalle:ntext',
        ],
    ]) ?>

</div>
