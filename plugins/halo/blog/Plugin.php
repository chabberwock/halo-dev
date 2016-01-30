<?php

namespace halo\blog;

use Yii;
use admin\events\Menu;

class Plugin extends \system\BasePlugin
{
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function migrationsPath()
    {
        return [
            $this->basePath . '/migrations'
        ];
    }
    
    
}
