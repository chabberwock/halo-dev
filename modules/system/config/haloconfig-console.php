<?php

return [
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'halo\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'system' => 'system\Module',
        'admin' => 'admin\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],

];
  
?>
