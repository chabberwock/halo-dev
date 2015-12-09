<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\system;
use yii\helpers\ArrayHelper;
use Yii;

require __DIR__ . '/PluginApplication.php';

class ConsoleApplication extends \yii\console\Application
{
    use PluginApplication;

    public function __construct($config) 
    {
        $this->pluginPath = $config['pluginPath'];
        $haloConfig = require(__DIR__ . '/haloconfig-console.php');
        parent::__construct(ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config-console.php'), $config));    
    }
    
}
  
?>
