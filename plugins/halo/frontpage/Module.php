<?php

namespace halo\frontpage;

use halo\admin\events\Menu;
use halo\system\BasePlugin;

class Module extends BasePlugin
{

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Frontpage', 'url'=>['/halo.admin/halo.frontpage.admin/default/index'], 'icon'=>'fa fa-cog'];
    }
    
    /**
    * Sets route as default website route
    * 
    * @param string $route
    */
    public function setRoute($route)
    {
        $this->runtimeConfig = ['defaultRoute' => $route];
    }
}
