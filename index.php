<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');
require(__DIR__ . '/vendor/autoload.php');

// we need do it manually to get nice phpdoc code completion in IDE
require(__DIR__ . '/vendor/yiisoft/yii2/BaseYii.php');

require __DIR__ . '/modules/system/PluginApplication.php';
require __DIR__ . '/modules/system/PluginManager.php';

require(__DIR__ . '/modules/system/Application.php');
require(__DIR__ . '/modules/system/ConsoleApplication.php');

require(__DIR__ . '/code-completion-helper.php');

$config = require(__DIR__ . '/config/web.php');

(new \system\Application($config))->run();
