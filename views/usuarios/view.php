<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->usuario_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->usuario_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->usuario_id], [
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
            'usuario_id',
            'usuario_nombre',
            'usuario_apellido',
            'usuario_correo:ntext',
            'usuario_clave:ntext',
            'usuario_fecha_creacion',
            'usuario_fecha_modificacion',
            'usuario_fecha_ultimo_acceso',
            'usuario_telefono_1',
            'usuario_telefono_2',
            'usuario_genero',
            'usuario_fecha_nacimiento',
            'usuario_fecha_codigo',
            'usuario_codigo',
            'usuario_direccion:ntext',
            'instituto_id',
            'usuario_perfil',
        ],
    ]) ?>

</div>
