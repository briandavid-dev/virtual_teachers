<?php

use yii\helpers\Html;


$this->title = 'Registrar';
$this->params['breadcrumbs'][] = ['label' => 'estudiantes', 'url' => ['index?id=estudiante']];
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
