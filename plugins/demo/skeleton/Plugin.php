<?php

namespace demo\skeleton;
use app\system\BasePlugin;

class Plugin extends BasePlugin
{
    public $controllerNamespace = 'demo\skeleton\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function pluginInfo()
    {
        return [
            'name' => 'Skeleton plugin',
            'description' => 'Just a demo plugin',
            'build' => 1,
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-gift',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
}
