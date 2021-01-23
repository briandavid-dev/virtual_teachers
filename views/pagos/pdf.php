<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <?php print $model->estudiante->instituto->instituto_nombre;?>
          <small class="pull-right"><?php print date('d-m-Y')?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-md-12 ">
               <h4>Datos del representante</h4> 

          <strong>Nombre:</strong> <?php print $model->pago_representante_nombre." ".$model->pago_representante_apellido;?></strong><br>
          <strong>Cédula:</strong> <?php print $model->pago_representante_cedula;?> 
        
        <h4>Datos sobre el pago</h4>
  
          <strong>Fecha:</strong> <?php print date('d-m-Y h:i:s a',strtotime($model->pago_fecha_creacion));?> <br>
          <strong>Forma:</strong> <?php print $model->formaPago->forma_pago_nombre;?> <br>
          <strong>Motivo:</strong>  <?php print $model->tipoPago->tipo_pago_nombre." ".$data->pago_mensualidad_mes;?><br>
          <strong>Monto:</strong> <?php print $model->pago_monto;?> <br>
          <strong>Codígo:</strong> <?php print $model->pago_educacion_id?><br>

        <h4>Datos del estudiante</h4>
        <strong>Nombre del estudiante: </strong> <?php print $model->estudiante->usuario_nombre." ".$model->estudiante->usuario_apellido;?><br>
          <strong>Cédula  del estudiante: </strong><?php print $model->estudiante->usuario_cedula;?><br>
          <strong>Institución:</strong> <?php print $model->estudiante->instituto->instituto_nombre;?> <br>
  


      </div>
    </div>
  </section>

</div>
</body>

