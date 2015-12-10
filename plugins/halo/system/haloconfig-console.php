<?php

return [
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'halo\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'system' => 'halo\system\Module',
        'admin' => 'halo\admin\Module',
    ],
    'components' => [
        'pluginManager' => [
           'class' => 'halo\system\PluginManager'
        ],
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
