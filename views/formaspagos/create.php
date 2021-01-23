<?php

use yii\helpers\Html;


$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Formas de pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
	<div class="box-body">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
