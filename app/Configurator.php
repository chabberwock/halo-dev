<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app;
use yii\helpers\ArrayHelper;         

class Configurator
{
    private $pluginsDir;
    
    public function __construct()
    {
        $this->pluginsDir = dirname(__DIR__) . '/plugins';
    }
    
    public function getConfig()
    {
        $config = [];
        foreach ($this->getVendors() as $vendorPath) {
            \Yii::setAlias(basename($vendorPath), $vendorPath);                    
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $modulePath) {
                if (file_exists($modulePath . '/config.php')) {
                    $config = ArrayHelper::merge($config, require($modulePath . '/config.php'));
                }
            }
        }
        return $config;
    }
    
    private function getVendors()
    {
        return glob($this->pluginsDir . '/*', GLOB_ONLYDIR);
    }
    
    
}
  
?>
