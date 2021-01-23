<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'instituto_id') ?>

    <?= $form->field($model, 'ciudad_id') ?>

    <?= $form->field($model, 'instituto_nombre') ?>

    <?= $form->field($model, 'instituto_direccion') ?>

    <?= $form->field($model, 'instituto_tipo') ?>

    <?php // echo $form->field($model, 'pais_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
