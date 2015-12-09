<?php

namespace halo\page;
use halo\system\BasePlugin;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\page\controllers';

    public function pluginInfo()
    {
        return [
            'name' => 'Pages',
            'build' => 1,
            'description' => 'Manage website pages',
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-file-text',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
    
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    
}
