<?php

use yii\helpers\Html;

$this->title = 'Actualizar tipo de pago: ' . $model->tipo_pago_nombre;
?>
<div class="box box-info">
	<div class="box-body">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
