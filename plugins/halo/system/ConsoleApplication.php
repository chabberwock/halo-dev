<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\system;
use yii\helpers\ArrayHelper;
use Yii;

require __DIR__ . '/PluginApplication.php';

class ConsoleApplication extends \yii\console\Application
{
    use PluginApplication;

    public function __construct($config) 
    {
        $this->initPluginManager($config);
        $haloConfig = require(__DIR__ . '/haloconfig-console.php');
        $cfg = ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config-console.php'), $config);
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
