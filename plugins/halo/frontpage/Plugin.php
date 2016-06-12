<?php

namespace halo\frontpage;

use admin\events\Menu;
use system\BasePlugin;

class Plugin extends BasePlugin
{
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
    
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('content');
            $child = $menu->item('general');
            $child->add('Frontpage', ['/admin/halo.frontpage.admin/default/index'], 'fa fa-cog');
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
