<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;
use yii\helpers\Url;
use app\models\Users;
use app\models\Institutos;

DashboardAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?php print Url::base(true).'/web/resources/images/logos/bmosoluciones.ico'; ?>" />
    <?= Html::csrfMetaTags() ?>
        <title>
            <?= Html::encode($this->title) ?>
        </title>

       

        <?php $this->head() ?>
</head>

<?php 

    $modelinstituto = Institutos::find()->where(['instituto_id' => Yii::$app->user->identity->instituto_id])->one();
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->beginBody() ?>
       <header class="main-header">
            <a href="#" class="logo">
                <span class="logo-mini"><b>CP</b></span>
                <span class="logo-lg"><b>Control</b>Panel</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs"><?php print Yii::$app->user->identity->usuario_nombre." ".Yii::$app->user->identity->usuario_apellido;   ?></span>  
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">

        <?php  
            switch (Yii::$app->user->identity->usuario_perfil){
                case 'administrador':   

                ?>  
                  <li>
                        <a href="<?php print Url::to(['usuarios/index?id=estudiante']);?>">
                            <i class="fa fa-graduation-cap"></i> <span>Estudiantes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li> 
                         <li>
                        <a href="<?php print Url::to(['periodosescolares/index']);?>">
                            <i class="fa fa-calendar"></i> <span>Periodos escolares</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li>
                      

               
                       <li>
                        <a href="<?php print Url::to(['formaspagos/index']);?>">
                            <i class="fa fa-bars"></i> <span>Formas de pago</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li>
                                                 <li>
                        <a href="<?php print Url::to(['usuarios/index?id=admin']);?>">
                            <i class="fa fa-users"></i> <span>Usuarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li> 
                       <li>
                        <a href="<?php print Url::to(['usuarios/miusuario','id'=>Yii::$app->user->identity->usuario_id]);?>">
                            <i class="fa fa-user"></i> <span>Mi cuenta</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li> 
                     <li>
                        <a href="<?php print Url::to(['/logout']);?>">
                            <i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li>

      <?php 
             break;

             case 'registrador':   

                ?>  
                  <li>
                        <a href="<?php print Url::to(['usuarios/index?id=estudiante']);?>">
                            <i class="fa fa-graduation-cap"></i> <span>Estudiantes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li> 
                         <li>
                        <a href="<?php print Url::to(['usuarios/miusuario','id'=>Yii::$app->user->identity->usuario_id]);?>">
                            <i class="fa fa-user"></i> <span>Mi usuario</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li> 
                     <li>
                        <a href="<?php print Url::to(['/logout']);?>">
                            <i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    
                    </li>

      <?php 
             break;
         }
     
              ?>  
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
<strong>
      <?php print $modelinstituto->instituto_nombre; ?>
        </strong>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
 
            <!-- /.box-header -->
            <div class="box-body">
             
                 <?php 

                print $content; ?>
          
              <!-- /.row -->
            </div>

            <!-- /.box-footer -->
          </div>
        </div>
      </div>
    </section>
  </div>

 <footer class="main-footer">
            <div class="pull-right hidden-xs">
               
            </div>
            &copy; <b><?php print Yii::$app->params['panelClienteNombre']; ?></b>
            <?= date('Y') ?> All rights reserved.
        </footer>
        <?php $this->endBody() ?>
    </div>
</body>

</html>
<?php $this->endPage() ?>
