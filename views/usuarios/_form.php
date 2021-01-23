<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

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


<div class="col-md-3">
     <?= $form->field($model, 'usuario_nombre')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
    <?= $form->field($model, 'usuario_apellido')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     <?= $form->field($model, 'usuario_correo')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     <?= $form->field($model, 'usuario_cedula')->textInput(['maxlength' => true]) ?>
    
</div>

<div class="col-md-3">
    
          <?php 
        
        $a  = "";
        
        if(!$model->isNewRecord) {
          
          $ts   = strtotime($model->usuario_fecha_nacimiento);
          $a = date("d-m-Y", $ts);

        }
echo $form->field($model, 'usuario_fecha_nacimiento')->widget(DatePicker::classname(), [
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
   
    <?= $form->field($model, 'usuario_telefono_1')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     
      <?= $form->field($model, 'usuario_telefono_2')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     
     <?php
                  echo $form->field($model, 'usuario_genero')->dropDownList(
                    Yii::$app->params['genero'],['prompt'=>'Seleccione...']);
              ?>
</div>
<div class="col-md-12">
        <?= $form->field($model, 'usuario_direccion')->textarea(['rows' => 6]) ?>
    </div>


            <div class="col-md-8">

            <div>&nbsp;</div>

        <?= Html::a(
        $model->isNewRecord ? 'Agregar' : 'Actualizar',
        $model->isNewRecord ? ['usuarios/create'] : ['usuarios/update','id'=>$model->usuario_id],
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



  

