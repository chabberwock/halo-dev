<?php
$basePath =  dirname(dirname(__DIR__));

$config = [
    'id' => 'basic',
    'basePath' => $basePath,
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/vendor',  
    'pluginPath' => $basePath . '/plugins', 
    'defaultRoute'  => '/system/install',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5rjnhKxtzI74aMSKaRXHDhMIAnOowNGT',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => true,
            'enablePrettyUrl' => false,  
        ],
        'themeManager' => [
            'class' => 'system\ThemeManager',
            'themeDir' => $basePath . '/themes',
            'theme' => 'dev',
        ],
        'db' => require($basePath . '/config/db.php'),
    ],
    'params' => [],
];

return $config;
