<?php
$basePath =  __DIR__;

$params = [
    'haloPath' => dirname($basePath),
    'databaseDump' => $basePath . '/install.sql'
];

$haloTemp = [
    'id' => 'basic',
    'bootstrap' => ['log'],
    'basePath' => $basePath . '/app',
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/../vendor',  
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5rjnhKxtzI74aMSKaRXHDhMIAnOowNGT',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '/install'
        ], 
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:' . $basePath . '/install.dat',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
    ],
    'params' => $params
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $haloTemp['bootstrap'][] = 'debug';
    $haloTemp['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $haloTemp['bootstrap'][] = 'gii';
    $haloTemp['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $haloTemp;



return $config;
