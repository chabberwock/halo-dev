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
    

    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('content');
            $child = $menu->item('general');
            $child->add('Menu', ['/admin/halo.menu.admin'], 'fa fa-bars');
    }

}
