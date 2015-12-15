<?php

$haloTemp = [
    'bootstrap' => ['log','themeManager','halo\system\Bootstrap', 'halo\admin\Bootstrap'],
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,  
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => '/halo.system/default/error'
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
    'modules' => [
        'halo.system' => [
            'class' => 'halo\system\Module'
        ],
        'halo.admin' => [
            'class' => 'halo\admin\Module'
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/content',
            'uploadUrl' => '@web/content',
            'imageAllowExtensions'=>['jpg','png','gif','svg','jpeg'],
            'widgetClientOptions' => [
                'plugins' => ['imagemanager','source','codemirror']            
            ],
        ],        
    ],

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
  
?>
