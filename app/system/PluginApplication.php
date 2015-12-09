<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace app\system;
use yii\helpers\ArrayHelper;
use Yii;

trait PluginApplication 
{
    public $pluginPath;

    protected function loadPluginConfigs($configName)
    {
        $config = [];
        foreach (glob($this->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            \Yii::setAlias(basename($vendorPath), $vendorPath);
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                if (is_file($pluginPath . $configName)) {
                    $config = ArrayHelper::merge($config, require($pluginPath . $configName));
                }
            }
        }
        return $config;
    }
    
}
  
?>
