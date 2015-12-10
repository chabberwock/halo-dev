<?php

namespace halo\admin;

use Yii;
use yii\helpers\ArrayHelper;

class Module extends \halo\system\BasePlugin
{
    public $mainMenu = [];
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
//        foreach (glob(Yii::$app->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
//            Yii::setAlias(basename($vendorPath), $vendorPath);
//            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
//                if (file_exists($pluginPath . '/config-admin.php')) {
//                    $config = ArrayHelper::merge($config, require($pluginPath . '/config-admin.php'));
//                }
//            }
//        }
        Yii::configure($this, $config);
        Yii::$app->layoutPath = '@halo/admin/views/layouts';        
        parent::init();
        // custom initialization code goes here
    }
    
    public function menuItems()
    {
        return [
            ['label'=>'Plugins', 'icon'=>'fa fa-cogs', 'url'=>['/halo.admin/plugin/index']]
        ];
    }
    
    public function pluginInfo()
    {
        return [
            'name' => 'Admin',
            'description' => 'Provides admin panel support',
            'build' => 1,
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-cogs',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
    
    
}
