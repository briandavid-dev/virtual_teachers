<?php

use yii\helpers\Html;

$this->title = 'Actualizar forma de pago: ' . $model->forma_pago_nombre;
?>
<div class="box box-info">
	<div class="box-body">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
