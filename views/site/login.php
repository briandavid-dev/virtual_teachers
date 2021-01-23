<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>



<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesión</p>
                      <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <?= Yii::$app->session->getFlash('success') ?>
      </div>
  <?php endif; ?>

    <form action="login" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="correo" placeholder="Email" required="true">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password" required="true">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
</div>

</body>


