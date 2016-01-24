<?php

namespace halo\page;
use system\BasePlugin;
use admin\events\Menu;

class Module extends BasePlugin
{
    public $controllerNamespace = 'halo\page\controllers';


    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('content');
            $pages = $menu->item('pages');
            $pages->label = 'Pages';
            $pages->add('New Page', ['/admin/halo.page.admin/default/create'], 'fa fa-plus');
            $pages->add('All Pages', ['/admin/halo.page.admin/default/index'], 'fa fa-files-o');
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
