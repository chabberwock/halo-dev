<?php
$basePath =  dirname(__DIR__);

$params = require(__DIR__ . '/params.php');

$config = [
    'defaultRoute' => '/phplego.kotlinsite/default',

    'id' => 'basic',
    'basePath' => $basePath,
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/vendor',  
    'pluginPath' => $basePath . '/plugins',  
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5rjnhKxtzI74aMSKaRXHDhMIAnOowNGT',
        ],
        'themeManager' => [
            'class' => 'halo\system\ThemeManager',
            'themeDir' => $basePath . '/themes',
            'theme' => 'dev',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

return $config;
