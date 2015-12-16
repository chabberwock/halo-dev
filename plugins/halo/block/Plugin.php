<?php

namespace halo\block;

use admin\events\Menu;

class Plugin extends \system\BasePlugin
{
    public $controllerNamespace = 'halo\block\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Content Blocks', 'url'=>['/admin/halo.block.admin/default/index'], 'icon'=>'fa fa-th'];
    }
    
    public function migrationsPath()
    {
        return [
            $this->basePath . '/migrations'
        ];
    }
    
    
    
}
