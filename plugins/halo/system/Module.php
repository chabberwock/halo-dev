<?php

namespace halo\system;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\system\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function pluginInfo()
    {
        return [
            'name' => 'System',
            'build' => 1,
            'description' => 'Manage website pages',
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-cogs',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
    
}
