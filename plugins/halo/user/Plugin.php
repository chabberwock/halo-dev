<?php

namespace halo\user;

class Plugin extends \halo\system\BasePlugin
{
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function pluginInfo()
    {
        return [
            'name' => 'Users',
            'description' => 'Users plugin, based on dektrium/yii2-user module',
            'build' => 1,
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-user',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
    
    public function migrationsPath()
    {
        return [
            $this->basePath . '/vendor/dektrium/yii2-user/migrations',
            $this->basePath . '/migrations',
        ];
    }
    
    public function adminMenu()
    {
        return [
            ['label'=>'Users', 'url'=>['/user/admin'], 'icon'=>'fa fa-user']
        ];        
    }
    
    
}