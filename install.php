<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
define('HALO_INSTALLER',true);
require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/modules/system/Application.php');
$config = require(__DIR__ . '/modules/system/config-install.php');
(new \system\Application($config))->run();
