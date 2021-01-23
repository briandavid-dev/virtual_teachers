<?php

use yii\helpers\Html;

$this->title = 'Registro de pago';
$this->params['breadcrumbs'][] = ['label' => 'estudiantes', 'url' => ['/usuarios/index?id=estudiante']];
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
