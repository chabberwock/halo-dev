<?php

namespace halo\frontpage;
use halo\system\BasePlugin;

class Module extends BasePlugin
{
    public function pluginInfo()
    {
        return [
            'name' => 'Frontpage',
            'description' => 'Displays frontpage',
            'build' => 1,
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-home',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function adminMenu()
    {
        return [
            ['label'=>'Front Page', 'url'=>['/halo.admin/halo.frontpage.admin'], 'icon'=>'fa fa-home']
        ];
    }
}
