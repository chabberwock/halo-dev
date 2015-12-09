<?php

return [
    'bootstrap' => ['log','themeManager','system'],
    'components' => [
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

];
  
?>
