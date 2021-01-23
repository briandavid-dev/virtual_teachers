<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodosEscolares */

$this->title = 'Update Periodos Escolares: ' . $model->periodo_escolar_id;
$this->params['breadcrumbs'][] = ['label' => 'Periodos Escolares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->periodo_escolar_id, 'url' => ['view', 'id' => $model->periodo_escolar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodos-escolares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
