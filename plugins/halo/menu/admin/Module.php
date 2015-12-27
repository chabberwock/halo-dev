<?php

namespace halo\menu\admin;

use Yii;
use admin\events\Menu;

class Module extends \system\BasePlugin
{
    public function init()
    {
        parent::init();
        
        Yii::$app->view->params['sidebarMenu'] = [
            ['label'=>'Menus', 'url'=>['/admin/halo.menu.admin/'], 'icon'=>'fa fa-bars'],
        ];
    }
    
    // displays plugin link in the content section of admin. Event attached in Bootstrap.php
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Menu', 'url'=>['/admin/halo.menu.admin'], 'icon'=>'fa fa-bars'];
    }
    
}
