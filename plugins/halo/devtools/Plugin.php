<?php

namespace halo\devtools;
use admin\events\Menu;

class Plugin extends \system\BasePlugin
{
    public $controllerNamespace = 'halo\devtools\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Developer', 'url'=>['/admin/halo.devtools.admin'], 'icon'=>'fa fa-cog'];
    }
    
}
