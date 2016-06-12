<?php

class Yii extends \yii\BaseYii
{
    /**
    * Halo Application
    *
    * @var BaseApplication|WebApplication|ConsoleApplication $app
    */
    public static $app;
}

/**
 * @property system\PluginManager $pluginManager
 */
abstract class BaseApplication  extends \yii\base\Application
{

}

class ConsoleApplication extends \system\ConsoleApplication
{
}


class WebApplication  extends \yii\web\Application
{
}


spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = require(__DIR__ . '/vendor/yiisoft/yii2/classes.php');
Yii::$container = new yii\di\Container();

