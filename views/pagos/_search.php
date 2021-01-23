<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pago_educacion_id') ?>

    <?= $form->field($model, 'pago_fecha_creacion') ?>

    <?= $form->field($model, 'pago_monto') ?>

    <?= $form->field($model, 'periodo_escolar_id') ?>

    <?= $form->field($model, 'forma_pago_id') ?>

    <?php // echo $form->field($model, 'estudiante_id') ?>

    <?php // echo $form->field($model, 'pago_representante_nombre') ?>

    <?php // echo $form->field($model, 'pago_representante_apellido') ?>

    <?php // echo $form->field($model, 'pago_representante_cedula') ?>

    <?php // echo $form->field($model, 'pago_representante_parentesco') ?>

    <?php // echo $form->field($model, 'tipo_pago_id') ?>

    <?php // echo $form->field($model, 'pago_detalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
