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
                if (file_exists($pluginPath . '/config.php')) {
                    $config = ArrayHelper::merge($config, require($pluginPath . '/config.php'));
                }
            }
        }
        \Yii::configure($this, $config);
    }
    
    public function activateTheme($themeName)
    {
        $themeName = $this->getActiveTheme();
        Yii::setAlias('theme', $this->basePath . '/' . $themeName);
        $this->view->theme->basePath = '@theme';
        $this->view->theme->baseUrl = '@web/themes/' . $themeName;
    }
    
    public function getActiveTheme()
    {
        return 'dev'; // TODO -o Alexandr makarov -c general: Replace with actual theme    
    }
}
  
?>