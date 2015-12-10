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
    
    public function adminMenu()
    {
        return [
            ['label'=>'Pages', 'url'=>['/halo.admin/halo.page.admin'], 'icon'=>'fa fa-home']
        ];        
    }
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    
    
    
}
