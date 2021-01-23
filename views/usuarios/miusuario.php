<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$this->title = $model->usuario_nombre." ".$model->usuario_apellido;

?>
<div class="box box-info">
    <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>

   
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
<div class="row">
	<div class="col-md-12 col-sm-12">
		<p class="note"><?php // print Yii::t('general','fields_required'); ?></p>
		<?= $form->errorSummary($model); ?>
		<div>&nbsp;</div>
	</div>
</div>
<div class="row">
			<div class="col-md-3 col-sm-6">
				<?= $form->field($model, 'usuario_nombre')->textInput(['maxlength' => true,'class' => 'form-control']); ?>
			</div>
			<div class="col-md-3 col-sm-6">
				<?= $form->field($model, 'usuario_apellido')->textInput(['maxlength' => true,'placeholder' ]); ?>
			</div>

				<div class="col-md-3 col-sm-6">
     
     				<?php
                  echo $form->field($model, 'usuario_genero')->dropDownList(
                    Yii::$app->params['genero'],['prompt'=>'Seleccione...']);
              ?>
				</div>
				<div class="col-md-3 col-sm-6">
     <?= $form->field($model, 'usuario_cedula')->textInput(['maxlength' => true]) ?>
    
				</div>

		<div class="col-md-6">
			<?= $form->field($model, 'usuario_correo')->textInput(['placeholder' => 'E-mail'])->label('E-mail <span class="required">*</span>') ?>
		</div>

		<div class="col-md-6">
			<?= $form->field($model, 'usuario_correo_confirmacion')->textInput(['placeholder' => 'E-mail'])->label('E-mail <span class="required">*</span>') ?>
		</div>


		<?php
		if(!$model->isNewRecord){
			$model->usuario_clave = "";
			$model->usuario_clave_confirmacion ="";
		}
		?>
		<div class="col-md-6">
			<?= $form->field($model, 'usuario_clave')->passwordInput(['placeholder' => 'Contraseña'])->label('Contraseña <span class="required">*</span>') ?>
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'usuario_clave_confirmacion')->passwordInput(['placeholder' => 'Contraseña'])->label('Contraseña <span class="required">*</span>') ?>
		</div>





			<div class="col-md-8">
			<div>&nbsp;</div>
			 <?= Html::a(
			 		$model->isNewRecord ? 'Crear' : 'Actualizar',
			 		$model->isNewRecord ? ['usuarios/createadmin'] : ['usuarios/miusuario','id'=>$model->usuario_id],
			 		[
		        	'data' => [
			            'method' => 'post',
			        	],
		 				'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
		    		])?>
    <div>&nbsp;</div>
			</div>

	</div>


<?php ActiveForm::end(); ?>

</div>
</div>