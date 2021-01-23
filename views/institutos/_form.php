<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Institutos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ciudad_id')->textInput() ?>

    <?= $form->field($model, 'instituto_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'instituto_direccion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'instituto_tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pais_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
