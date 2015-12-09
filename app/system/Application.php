<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\system;
use yii\helpers\ArrayHelper; 
use Yii;

require __DIR__ . '/PluginApplication.php';
class Application extends \yii\web\Application
{
    use PluginApplication;

    public function __construct($config) 
    {
        $this->pluginPath = $config['pluginPath'];
        $haloConfig = require(__DIR__ . '/haloconfig.php');
        parent::__construct(ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config.php'), $config));    
    }
    
}
  
?>
