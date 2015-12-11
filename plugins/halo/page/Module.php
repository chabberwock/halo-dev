<?php

namespace halo\page;
use halo\system\BasePlugin;
use halo\admin\events\MainMenu;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\page\controllers';

    public function onAdminMainMenu(MainMenu $event)
    {
        $event->items[] = ['label'=>'Pages', 'url'=>['/halo.admin/halo.page.admin'], 'icon'=>'fa fa-home'];
    }
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    
    
    
}
