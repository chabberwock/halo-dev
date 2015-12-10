<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\system;
use yii\helpers\ArrayHelper; 
use Yii;

require __DIR__ . '/PluginApplication.php';
require __DIR__ . '/PluginManager.php';

class Application extends \yii\web\Application
{
    use PluginApplication;

    public function __construct($config) 
    {
        $this->initPluginManager($config);
        $haloConfig = require(__DIR__ . '/haloconfig.php');
        $cfg = ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config.php'), $config);
        $file = $cfg['vendorPath'] . '/yiisoft/extensions.php';
        $extensions = is_file($file) ? include($file) : [];
        if (isset($cfg['extensions']) && is_array($cfg['extensions'])) {
            $cfg['extensions'] = ArrayHelper::merge($extensions, $cfg['extensions']);    
        } else {
            $cfg['extensions'] = $extensions;
        }
        parent::__construct($cfg);    
    }
    
}
  
?>
