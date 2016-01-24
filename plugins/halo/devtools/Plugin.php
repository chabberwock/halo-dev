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
    
    public function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('main');
        $menu->add('Developer', ['/admin/halo.devtools.admin'], 'fa fa-cog');
    }
    
}
