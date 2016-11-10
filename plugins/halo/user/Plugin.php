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
            $this->basePath . '/vendor/dektrium/yii2-rbac/migrations',
            $this->basePath . '/migrations',
        ];
    }
    
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('main');
        $menu->add('Users', ['/user/admin'], 'fa fa-user');
        
        $userMenu = $ui->menu('user');
        $users = $userMenu->add('Users');
        $users->add('List', ['/user/admin'], 'fa fa-home');
        $users->add('Create', ['/user/admin/create'], 'fa fa-plus');
        
        $ui->addWidget('content.mini', [
            'class' => 'halo\user\admin\widgets\MiniCounter',
        ]);
    }

}
