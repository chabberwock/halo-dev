<?php

namespace halo\admin;

use Yii;
use yii\helpers\ArrayHelper;
use halo\admin\events\MainMenu;

class Module extends \halo\system\BasePlugin
{
    public $sidebarMenu = [];
    
    public function init()
    {
        $config = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $namespace = explode('.', $pluginId)[0];
            $pluginPath = Yii::$app->pluginPath . DIRECTORY_SEPARATOR . str_replace('.',DIRECTORY_SEPARATOR, $pluginId);
            if (is_file($pluginPath . '/config-admin.php')) {
                $config = ArrayHelper::merge($config, require($pluginPath . '/config-admin.php'));
            }
        }
        Yii::configure($this, $config);
        Yii::$app->layoutPath = '@halo/admin/views/layouts';        
        parent::init();
        // custom initialization code goes here
    }
    
    
    public function onAdminMainMenu(MainMenu $event)
    {
        $event->items[] = ['label'=>'Plugins', 'url'=>['/halo.admin/plugin/index'], 'icon'=>'fa fa-cogs'];
    }
    
}
