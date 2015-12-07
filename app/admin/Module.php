<?php

namespace app\admin;

use Yii;
use yii\helpers\ArrayHelper;

class Module extends \yii\base\Module
{
    public $mainMenu = [];
    public function init()
    {
        $config = [];
        foreach (glob(Yii::$app->pluginPath . '/*', GLOB_ONLYDIR) as $vendorPath) {
            Yii::setAlias(basename($vendorPath), $vendorPath);
            foreach (glob($vendorPath .'/*', GLOB_ONLYDIR) as $pluginPath) {
                if (file_exists($pluginPath . '/config-admin.php')) {
                    $config = ArrayHelper::merge($config, require($pluginPath . '/config-admin.php'));
                }
            }
        }
        Yii::configure($this, $config);
        Yii::$app->layoutPath = '@app/admin/views/layouts';        
        parent::init();
        // custom initialization code goes here
    }
    
    public function menuItems()
    {
        return [
            ['label'=>'Plugins', 'icon'=>'fa fa-cogs', 'url'=>['/admin/plugin/index']]
        ];
    }
    
}
