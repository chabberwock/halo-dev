<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
define('HALO_INSTALLER',true);
require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/plugins/halo/system/Application.php');
$config = require(__DIR__ . '/plugins/halo/system/config-install.php');
(new \halo\system\Application($config))->run();
