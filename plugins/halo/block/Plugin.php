<?php

namespace halo\block;

use halo\admin\events\Menu;

class Plugin extends \halo\system\BasePlugin
{
    public $controllerNamespace = 'halo\block\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Content Blocks', 'url'=>['/halo.admin/halo.block.admin/default/index'], 'icon'=>'fa fa-th'];
    }
    
}
