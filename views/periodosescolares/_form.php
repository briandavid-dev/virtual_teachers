<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
?>

        <div class="row">

  

        <?php
            $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data'],
                    'method' => 'post',
                    'id' => 'form-usuarios-create'
                ]);
        ?>
    <div class="col-md-12 col-sm-12">
        <?= $form->errorSummary($model); ?>
                  <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <?= Yii::$app->session->getFlash('success') ?>
      </div>
  <?php endif; ?>
    </div>



<div class="col-md-3">
         <?php 
        
        $a  = "";
        
        if(!$model->isNewRecord) {
          
          $ts   = strtotime($model->periodo_escolar_fecha_desde);
          $a = date("d-m-Y", $ts);

        }
echo $form->field($model, 'periodo_escolar_fecha_desde')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Seleccione fecha ...',
'value' => $a],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy'
    ]
]);
                    
 ?>
    
</div>
<div class="col-md-3">
     <?php 
        
        $a  = "";
        
        if(!$model->isNewRecord) {
          
          $ts   = strtotime($model->periodo_escolar_fecha_hasta);
          $a = date("d-m-Y", $ts);

        }
echo $form->field($model, 'periodo_escolar_fecha_hasta')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Seleccione fecha ...',
'value' => $a],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy'
    ]
]);
                    
 ?>
    
</div>
<div class="col-md-3">
     <?= $form->field($model, 'periodo_escolar_monto_matricula')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     <?= $form->field($model, 'periodo_escolar_monto_mensualidad')->textInput(['maxlength' => true]) ?>
    
</div>


           <div class="col-md-8">

            <div>&nbsp;</div>

        <?= Html::a(
        $model->isNewRecord ? 'Agregar' : 'Actualizar',
        $model->isNewRecord ? ['periodosescolares/create'] : ['periodosescolares/update','id'=>$model->periodo_escolar_id],
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
