<?php

namespace app\assets;

use yii\web\AssetBundle;
 
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = array( 'position' => \yii\web\View::POS_HEAD ); 
   
    public $css = [
        'web/css/site.css',
        'web/css/AdminLTE.min.css',
        'web/css/bootstrap.min.css',
        'web/css/font-awesome.min.css',
        'web/css/ionicons.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'web/css/_all-skins.min.css',
        
        
        
        


    ];
    public $js = [


           // 'web/js/jquery.min.js',
            'web/js/bootstrap.min.js',
            'web/js/adminlte.min.js',
            'web/js/fastclick.js',

            'web/js/jquery.sparkline.min.js',
            'web/js/jquery.slimscroll.min.js',
            'web/js/Chart.js',
		    'themes/educacionvirtual/js/file-input-load-preview.js',
		    'themes/educacionvirtual/js/bootstrap.file-input.js',
            'themes/educacionvirtual/js/BMOFunctions.js',
            'config/configuracion.js',

           // 'web/js/demo.js',
            
 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
