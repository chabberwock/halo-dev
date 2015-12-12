<?php

namespace halo\user;
use halo\admin\events\Menu;

class Plugin extends \halo\system\BasePlugin
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
    
    public function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Users', 'url'=>['/user/admin'], 'icon'=>'fa fa-user'];
    }
    
    
}
