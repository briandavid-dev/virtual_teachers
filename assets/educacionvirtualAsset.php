<?php

namespace app\assets;

use yii\web\AssetBundle;

class educacionvirtualAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = array( 'position' => \yii\web\View::POS_HEAD ); 
   
    public $css = [

            'web/css/site.css',           

           


      ];
      
    public $js = [

                'themes/nexttouch/js/BMOFunctions.js',
                'config/configuracion.js',
          
    ];
    public $depends = [
       // 'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
