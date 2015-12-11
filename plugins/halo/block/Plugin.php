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
    
    public function headerMenu()
    {
        return [
            ['label'=>'HTML Blocks', 'url'=>['/halo.admin/halo.block.admin'], 'icon'=>'fa fa-th']
        ];        
    }
    
}
