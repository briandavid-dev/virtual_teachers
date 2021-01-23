<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudades */

$this->title = 'Update Ciudades: ' . $model->ciudad_id;
$this->params['breadcrumbs'][] = ['label' => 'Ciudades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ciudad_id, 'url' => ['view', 'id' => $model->ciudad_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ciudades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
