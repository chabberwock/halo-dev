<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\system;
use \yii\helpers\FileHelper;
use \yii\helpers\ArrayHelper;
use Yii;

class PluginManager extends \yii\base\Component
{
    public $runtimePath;
    public $pluginPath;

    private $_systemPlugins = ['halo.system', 'halo.admin', 'halo.user', 'halo.frontpage'];
    private $configFile;
    private $_activePlugins;
    
    private $_availablePlugins;
    
    public function init() 
    {

        if (!isset($this->runtimePath)) {
            $this->runtimePath = Yii::$app->runtimePath;
        }
        $this->configFile = $this->runtimePath . '/halo/active-plugins.php';    
        if (!is_dir(dirname($this->configFile))) {
            FileHelper::createDirectory(dirname($this->configFile));
        }
        if (file_exists($this->configFile)) {
            $this->_activePlugins = require($this->configFile);
        } else {
            $this->_activePlugins = [];
        }

        foreach (glob($this->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                $this->_availablePlugins[] = basename($vendorPath) . '.' . basename($pluginPath);
            }
        }
    }
    
    public function getAvailablePlugins()
    {
        return $this->_availablePlugins;    
    }
    
    public function getActivePlugins()
    {
        return ArrayHelper::merge($this->_activePlugins, $this->_systemPlugins);
    }
    
    public function activate($pluginId)
    {
        if (in_array($pluginId, $this->_activePlugins)) {
            return;
        }
        $this->_activePlugins[] = $pluginId;
        $this->export();    
    }
    
    public function deactivate($pluginId)
    {
        $key = array_search($pluginId, $this->_activePlugins);
        if ($key === false) {
            return;
        }
        unset($this->_activePlugins[$key]);
        $this->export();
    }
    
    protected function export()
    {
        $fileData = '<?php ' . "\n return" . var_export($this->_activePlugins, true) . ';';
        file_put_contents($this->configFile, $fileData);    
    }
    
}
  
?>
