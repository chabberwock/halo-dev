<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\system;
use yii\helpers\ArrayHelper;
use Yii;

class Application extends \yii\web\Application
{
    public $pluginPath;
    
    public function __construct($config) {
        $this->pluginPath = $config['pluginPath'];
        parent::__construct(ArrayHelper::merge($config, $this->loadPluginConfigs()));    
    }
    
    
    
    protected function loadPluginConfigs()
    {
        $config = [];
        foreach (glob($this->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            \Yii::setAlias(basename($vendorPath), $vendorPath);
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                if (file_exists($pluginPath . '/config.php')) {
                    $config = ArrayHelper::merge($config, require($pluginPath . '/config.php'));
                }
            }
        }
        return $config;
    }
}
  
?>
