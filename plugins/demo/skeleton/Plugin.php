<?php

namespace demo\skeleton;
use halo\system\BasePlugin;

class Plugin extends BasePlugin
{
    public $controllerNamespace = 'demo\skeleton\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
}
