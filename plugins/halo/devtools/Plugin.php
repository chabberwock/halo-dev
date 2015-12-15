<?php

namespace halo\devtools;
use halo\admin\events\Menu;

class Plugin extends \halo\system\BasePlugin
{
    public $controllerNamespace = 'halo\devtools\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Developer', 'url'=>['/halo.admin/halo.devtools.admin'], 'icon'=>'fa fa-cog'];
    }
    
}
