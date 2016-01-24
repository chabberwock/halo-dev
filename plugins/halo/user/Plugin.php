<?php

namespace halo\user;
use admin\events\Menu;

class Plugin extends \system\BasePlugin
{
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function migrationsPath()
    {
        return [
            $this->basePath . '/vendor/dektrium/yii2-user/migrations',
            $this->basePath . '/migrations',
        ];
    }
    
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('main');
        $menu->add('Users', ['/user/admin'], 'fa fa-user');
    }

}
