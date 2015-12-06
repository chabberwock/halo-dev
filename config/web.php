<?php
$basePath =  dirname(__DIR__);

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => $basePath . '/app',
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/vendor',  
    'pluginPath' => $basePath . '/plugins',  
    'bootstrap' => ['log','themeManager','system'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5rjnhKxtzI74aMSKaRXHDhMIAnOowNGT',
        ],
        'themeManager' => [
            'class' => 'app\system\ThemeManager',
            'themeDir' => $basePath . '/themes',
            'theme' => 'dev',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,  
        ], 
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => '/system/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
    ],
    'modules' => [
        'system' => [
            'class' => 'app\system\Module'
        ],
        'admin' => [
            'class' => 'app\admin\Module'
        ],
        'redactor' => 'yii\redactor\RedactorModule',        
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
