<?php

namespace halo\page;
use halo\system\BasePlugin;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\page\controllers';

    public function headerMenu()
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
