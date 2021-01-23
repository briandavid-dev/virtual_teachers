<?php

use yii\helpers\Html;

$this->title = $model->usuario_nombre." ".$model->usuario_apellido;

?>
<div class="box box-info">
    <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
