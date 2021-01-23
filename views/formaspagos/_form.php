<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

 <div class="row">

 	                <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <?= Yii::$app->session->getFlash('success') ?>
      </div>
  <?php endif; ?>

        <?php
            $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data'],
                    'method' => 'post',
                    'id' => 'form-usuarios-create'
                ]);
        ?>

                <div class="col-md-12 col-sm-12">
        <?= $form->errorSummary($model); ?>
    </div>

<div class="col-md-5">
     
      <?= $form->field($model, 'forma_pago_nombre')->textInput(['maxlength' => true]) ?>
    
</div>

<div class="col-md-8">

            <div>&nbsp;</div>

        <?= Html::a(
        $model->isNewRecord ? 'Agregar' : 'Actualizar',
        $model->isNewRecord ? ['formaspagos/create'] : ['formaspagos/update','id'=>$model->forma_pago_id],
        [
            'data' => [
                'method' => 'post',
              ],
          'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
          ])?>

    <div>&nbsp;</div>

            </div>

    <?php ActiveForm::end(); ?>

</div>
