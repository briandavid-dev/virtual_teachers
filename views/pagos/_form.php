<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\PeriodosEscolares;
use app\models\FormasPagos;
use app\models\TiposPagos;
Use yii\helpers\ArrayHelper;

?>

<input id="mes" type="hidden" name="mes" value="<?php print $model->pago_mensualidad_mes;?>">
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
     <?= $form->field($model, 'pago_monto')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
<?php

     $libs =  PeriodosEscolares::find()->orderBy(['periodo_escolar_id' => SORT_DESC])->all();
   
foreach($libs as &$lib){
    $lib->periodo_escolar_fecha_desde = date('d-m-Y',strtotime($lib->periodo_escolar_fecha_desde)).' hasta '.date('d-m-Y',strtotime($lib->periodo_escolar_fecha_hasta));
}

$items1 = ArrayHelper::map($libs, 'periodo_escolar_id','periodo_escolar_fecha_desde');
                                
      echo $form->field($model, 'periodo_escolar_id')->widget(Select2::classname(), [
                                'data' => $items1,
                                'language' => 'es',
                                'options' => [
                                'placeholder' => 'Seleccione',
                                ],
                                'pluginOptions' => [
                                'allowClear' => false
                                        ],
                                ])->label('Periodo escolar');
        ?>
    
</div>
<div class="col-md-2">
           <?php $items1 = ArrayHelper::map(FormasPagos::find()
                      ->all(), 'forma_pago_id', 'forma_pago_nombre');
                                
      echo $form->field($model, 'forma_pago_id')->widget(Select2::classname(), [
                                'data' => $items1,
                                'language' => 'es',
                                'options' => [
                                'placeholder' => 'Seleccione',
                                ],
                                'pluginOptions' => [
                                'allowClear' => false
                                        ],
                                ])->label('Forma de pago');
                                
        ?>
    
</div>
<div class="col-md-2">
                  <?php $items1 = ArrayHelper::map(TiposPagos::find()
                      ->all(), 'tipo_pago_id', 'tipo_pago_nombre');
                                
      echo $form->field($model, 'tipo_pago_id')->widget(Select2::classname(), [
                                'data' => $items1,
                                'language' => 'es',
                                'options' => [
                                'placeholder' => 'Seleccione',
                                ],
                                'pluginOptions' => [
                                'allowClear' => false
                                        ],
                                ])->label('Tipo de pago');
                                
        ?>
     
    
</div>
<div class="col-md-2">
  <?php
                       echo $form->field($model, 'pago_mensualidad_mes')->dropDownList([
                              'prompt'=>'Seleccione...']); 

                        ?>
  </div>

<div class="col-md-3">
    
     <?= $form->field($model, 'pago_representante_nombre')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     
      <?= $form->field($model, 'pago_representante_apellido')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
     
     <?= $form->field($model, 'pago_representante_cedula')->textInput(['maxlength' => true]) ?>
    
</div>
<div class="col-md-3">
    <?php 
            echo $form->field($model, 'pago_representante_parentesco')->dropDownList(
                    Yii::$app->params['parentesco'],
                    ['prompt'=>'Seleccione...'])->label('Parentesco <span class="required">*</span>');
 
?>
    
</div>

<div class="col-md-12">
       <?= $form->field($model, 'pago_detalle')->textarea(['rows' => 6]) ?>
    
</div>


<div class="col-md-8">

            <div>&nbsp;</div>

        <?= Html::a(
        $model->isNewRecord ? 'Agregar' : 'Actualizar',
        $model->isNewRecord ? ['pagos/create?id='.$_REQUEST['id']] : ['pagos/update','id'=>$model->pago_educacion_id],
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
<script>

  $( document ).ready(function() {
     var test = $( "#mes" ).val()

    $( "select#pagos-pago_mensualidad_mes" ).html('<select><option value ="'+test+'">' + test + '</option></select>')
    
});
   $('select#pagos-periodo_escolar_id').on('change', function() {


$( "select#pagos-pago_mensualidad_mes" ).html('<select><option value ="0">Seleccione</option></select>')

    })
  
 $('select#pagos-tipo_pago_id').on('change', function() {
      arrayMeses = new Array()
     var fecha = $('select#pagos-periodo_escolar_id option:selected').text(),
         fechaInc = fecha.substr(3,2),
         fechaFin = fecha.substr(20,2),
         num=fechaInc.charAt(0)
         $("select#pagos-pago_mensualidad_mes").prop("disabled", true);
         if(num==0){

          fechaInc =fechaInc.substr(1,1)


         }
         fechaInc = parseInt(fechaInc)
         fechaFin = parseInt(fechaFin)
var ia =1;
var html =''
html+= '<select>'


                     

     if(fechaInc < fechaFin ) {

        for (var i = fechaInc; i <= fechaFin; i++) {
          var test = mesObtener(i)
            //arrayMeses[ia] = test;
            //ia++
            html += '<option value ="'+test+'">' + test + '</option>';
        }


     } else {
        for (var i = 1; i <= 12; i++) {

          if(fechaInc <= i){

       var test = mesObtener(i)
           // arrayMeses[ia] = test;
             //ia++
html += '<option value ="'+test+'">' + test + '</option>';
          }
          if(fechaFin >=i) {
            var test = mesObtener(i)
           // arrayMeses[ia] = test;
            // ia++
            html += '<option value ="'+test+'">' + test + '</option>';




          }
        
        }

     }
     
     html+='</select>'

     
$( "select#pagos-pago_mensualidad_mes" ).html('<select><option value ="0">Seleccione</option></select>')
     if($('select#pagos-tipo_pago_id option:selected').text()=="Mensualidad"){

      $( "select#pagos-pago_mensualidad_mes" ).html(html)
       $("select#pagos-pago_mensualidad_mes").prop("disabled", false);
     }
    
    })
 function mesObtener(i)
 {


    switch(i) {
      case 1:
return "Enero";


      break;
       case 2:
      return  "Febrero";


      break;
       case 3:
       return  "Marzo";


      break;
       case 4:
       return  "Abril";


      break;
       case 5:
       return  "Mayo";


      break;
       case 6:
      return  "Junio";


      break;
       case 7:
      return  "Julio";


      break;
       case 8:
      return  "Agosto";


      break;
       case 9:
       return  "Septiembre";

      break;
       case 10:
        return  "Octubre";


      break;
       case 11:
       return  "Noviembre";


      break;
         case 12:
         return  "Diciembre";


      break;



    }

 }

</script>
