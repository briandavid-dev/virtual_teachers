<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paises */

$this->title = 'Update Paises: ' . $model->pais_id;
$this->params['breadcrumbs'][] = ['label' => 'Paises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pais_id, 'url' => ['view', 'id' => $model->pais_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paises-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>