<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodosEscolares */

$this->title = $model->periodo_escolar_id;
$this->params['breadcrumbs'][] = ['label' => 'Periodos Escolares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-escolares-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->periodo_escolar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->periodo_escolar_id], [
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
            'periodo_escolar_id',
            'periodo_escolar_fecha_desde',
            'periodo_escolar_fecha_hasta',
            'periodo_escolar_monto_matricula',
            'periodo_escolar_monto_mensualidad',
            'instituto_id',
        ],
    ]) ?>

</div>
