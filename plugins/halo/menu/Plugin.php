<?php

namespace halo\menu;

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
            $this->getBasePath() . '/migrations',
        ];
    }
    
    
}
