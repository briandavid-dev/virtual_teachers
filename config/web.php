<?php
use kartik\mpdf\Pdf;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'language'          =>'es-ES',
	'charset'          =>'UTF-8', 
    'components' => [

        'request' => [
            'cookieValidationKey' => 'cualquiercosa',
            'enableCsrfValidation' => false,

        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
              'maxSourceLines' => 20,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

    		'urlManager' => [
    				'class' => 'yii\web\UrlManager',
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'enableStrictParsing' => true,
    				'rules' => [
    						'/' => 'site/index',
    						'<controller:\w+>/<id:\d+>'=>'<controller>/view',
        					'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    						'<http:\w[ñáéíóúÁÉÍÓÚa-zA-Z-0-9]+>' => 'site/urlmanage',
    				],
                ],

        'view' => [
        'theme'=>[
            'basePath' =>'@app/themes/educacionvirtual',
            'baseUrl' => '@web/themes/educacionvirtual',
            'pathMap' =>[
                '@app/views' => '@app/themes/educacionvirtual',
                        ],
                 ],
                ],
            ],
		        'modules' => [
                    'us' => [
                        'class' => 'app\modules\us\Module',
                    ],

			'redactor' => 'yii\redactor\RedactorModule',
            'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*'] // adjust this to your needs

    ];

}

return $config;
