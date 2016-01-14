<?php

namespace halo\frontpage;

use admin\events\Menu;
use system\BasePlugin;

class Module extends BasePlugin
{
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
    
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Frontpage', 'url'=>['/admin/halo.frontpage.admin/default/index'], 'icon'=>'fa fa-cog'];
    }
    
    /**
    * Sets route as default website route
    * 
    * @param string $route
    */
    public function setRoute($route)
    {
        $this->runtimeConfig = ['params' => ['frontpageRoute'=>$route]];
    }
}
