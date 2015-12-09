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
        $cfg = ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config.php'), $config);

        $file = $cfg['vendorPath'] . '/yiisoft/extensions.php';
        $extensions = is_file($file) ? include($file) : [];
        
        if (is_array($cfg['extensions'])) {
            $cfg['extensions'] = ArrayHelper::merge($extensions, $cfg['extensions']);    
        } else {
            $cfg['extensions'] = $extensions;
        }
        
        
        parent::__construct($cfg);    
    }
    
}
  
?>
