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
    
    public function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Frontpage', 'url'=>['/halo.admin/halo.frontpage.admin/default/index'], 'icon'=>'fa fa-cog'];
    }
}
