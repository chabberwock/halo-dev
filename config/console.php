<?php
$basePath =  dirname(__DIR__);

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => $basePath . '/app',
    'runtimePath' => $basePath . '/runtime',
    'vendorPath' => $basePath . '/vendor',  
    'pluginPath' => $basePath . '/plugins',  
    'components' => [
        'db' => $db,
    ],
    'params' => $params,
];
