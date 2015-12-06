<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\system;
use Yii;

class Application extends \yii\web\Application
{
    public $pluginPath;
    public $isAdmin;
    public $adminPrefix = 'admin';
    
    public function init()
    {
        $prefix = strtok($_SERVER['REQUEST_URI'], '/');
        $this->isAdmin = $prefix == $this->adminPrefix;
        $this->loadPluginConfigs();
        parent::init();
    }
    
    protected function loadPluginConfigs()
    {
        foreach (glob($this->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            \Yii::setAlias(basename($vendorPath), $vendorPath);
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                if (file_exists($pluginPath . '/config.php')) {
                    \Yii::configure($this, require($pluginPath . '/config.php'));
                }
                if ($this->isAdmin && file_exists($pluginPath . '/config-admin.php')) {
                    \Yii::configure($this, require($pluginPath . '/config-admin.php'));
                }
            }
        }
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
