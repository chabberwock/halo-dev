<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\system;
use yii\helpers\ArrayHelper;
use Yii;

class ConsoleApplication extends \yii\console\Application
{
    public $pluginPath;
    
    public function init()
    {
        $this->loadPluginConfigs();
        parent::init();
    }
    
    protected function loadPluginConfigs()
    {
        $config = [];
        foreach (glob($this->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            \Yii::setAlias(basename($vendorPath), $vendorPath);
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                if (file_exists($pluginPath . '/config-console.php')) {
                    $config = ArrayHelper::merge($config, require($pluginPath . '/config-console.php'));
                }
            }
        }
        \Yii::configure($this, $config);
    }
}
  
?>
