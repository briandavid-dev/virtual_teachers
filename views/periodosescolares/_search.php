<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodosEscolaresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-escolares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'periodo_escolar_id') ?>

    <?= $form->field($model, 'periodo_escolar_fecha_desde') ?>

    <?= $form->field($model, 'periodo_escolar_fecha_hasta') ?>

    <?= $form->field($model, 'periodo_escolar_monto_matricula') ?>

    <?= $form->field($model, 'periodo_escolar_monto_mensualidad') ?>

    <?php // echo $form->field($model, 'instituto_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
