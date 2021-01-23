<?php

use yii\helpers\Html;


$this->title = 'Actualizar pago de estudiante: '.$model->estudiante->usuario_nombre." ".$model->estudiante->usuario_apellido;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pago_educacion_id, 'url' => ['view', 'id' => $model->pago_educacion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagos-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
