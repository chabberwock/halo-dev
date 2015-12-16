<?php

namespace halo\page;
use system\BasePlugin;
use admin\events\Menu;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\page\controllers';

    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Pages', 'options' =>['class'=>'header']];        
        $event->items[] = ['label'=>'New Page',  'url'=>['/admin/halo.page.admin/default/create'], 'icon'=>'fa fa-plus'];
        $event->items[] = ['label'=>'All Pages', 'url'=>['/admin/halo.page.admin/default/index'], 'icon'=>'fa fa-files-o'];
    }
    
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
