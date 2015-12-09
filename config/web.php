<?php
$basePath =  dirname(__DIR__);

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => $basePath . '/app',
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/vendor',  
    'pluginPath' => $basePath . '/plugins',  
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5rjnhKxtzI74aMSKaRXHDhMIAnOowNGT',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
