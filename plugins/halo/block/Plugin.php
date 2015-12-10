<?php

namespace halo\block;

class Plugin extends \halo\system\BasePlugin
{
    public $controllerNamespace = 'halo\block\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function pluginInfo()
    {
        return [
            'name' => 'HTML Blocks',
            'description' => 'Insert html blocks into your site, that can be editev via admin panel',
            'build' => 1,
            'author' => 'Alexandr Makarov',
            'icon' => 'fa fa-th',
            'homepage' => 'https://github.com/chabberwock/halo-dev'
        ];
    }
    
    public function adminMenu()
    {
        return [
            ['label'=>'HTML Blocks', 'url'=>['/halo.admin/halo.block.admin'], 'icon'=>'fa fa-th']
        ];        
    }
    
}
