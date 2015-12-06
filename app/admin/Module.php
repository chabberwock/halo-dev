<?php

namespace app\admin;

use Yii;

class Module extends \yii\base\Module
{
    const EVENT_BUILD_MENU = 'EVENT_BUILD_MENU';
    
    public $controllerNamespace = 'app\admin\controllers';

    public function init()
    {
        Yii::$app->layoutPath = '@app/admin/views/layouts';        
        parent::init();

        // custom initialization code goes here
    }
    
    public function getMenuItems() 
    {
        $event = new MainMenuEvent();
        $this->trigger(self::EVENT_BUILD_MENU, $event);
        return $event->items;
    }
}
