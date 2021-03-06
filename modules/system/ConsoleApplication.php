<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace system;
use yii\helpers\ArrayHelper;
use Yii;

class ConsoleApplication extends \yii\console\Application
{
    use PluginApplication;

    public function __construct(array $config = []) 
    {
        Yii::setAlias('system', __DIR__);
        Yii::setAlias('admin', dirname(__DIR__) . '/admin');
        $this->initPluginManager($config);
        $haloConfig = require(__DIR__ . '/config/haloconfig-console.php');
        $cfg = ArrayHelper::merge($haloConfig, $this->loadPluginConfigs('/config-console.php'), $config);
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
