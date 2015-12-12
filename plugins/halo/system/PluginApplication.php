<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\system;
use yii\helpers\ArrayHelper;
use Yii;

trait PluginApplication 
{
    public $pluginPath;

    protected function loadPluginConfigs($configName)
    {
        $config = [];
        if (count($this->pluginManager->activePlugins) > 0)
        {
            foreach ($this->pluginManager->activePlugins as $pluginId) {
                $namespace = explode('.', $pluginId)[0];
                $pluginPath = $this->pluginManager->pluginPath . DIRECTORY_SEPARATOR . str_replace('.',DIRECTORY_SEPARATOR, $pluginId);
                Yii::setAlias($namespace, dirname($pluginPath));
                if (is_file($pluginPath . $configName)) {
                    $config = ArrayHelper::merge($config, require($pluginPath . $configName));
                }
            }

            // Now load runtime plugin configs, they can override base configs
            foreach ($this->pluginManager->activePlugins as $pluginId) {
                $pluginRuntimeConfig = $this->pluginManager->runtimePath 
                    . DIRECTORY_SEPARATOR . 'halo' . DIRECTORY_SEPARATOR . 'plugins' 
                    . DIRECTORY_SEPARATOR . str_replace('.',DIRECTORY_SEPARATOR, $pluginId) 
                    . $configName;
                if (is_file($pluginRuntimeConfig)) {
                    $config = ArrayHelper::merge($config, require($pluginRuntimeConfig));
                }
            }
            
        }
        return $config;
    }
    
    protected function initPluginManager($userConfig)
    {
        if (isset($userConfig['components'], $userConfig['components']['pluginManager'])) {
            $definition = $userConfig['components']['pluginManager'];
        } else {
            $definition = ['class' => 'halo\system\PluginManager'];
        }

        if (!isset($definition['pluginPath'])) {
            $definition['pluginPath'] = $userConfig['basePath'] . DIRECTORY_SEPARATOR . 'plugins';
        }

        if (!isset($definition['runtimePath'])) {
            $definition['runtimePath'] = $userConfig['runtimePath'];
        }
        
        $this->setComponents([
            'pluginManager' => $definition
        ]);
    }
    
}
  
?>
