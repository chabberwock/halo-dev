<?php

namespace halo\block;

use admin\events\Menu;
use Yii;

class Plugin extends \system\BasePlugin
{
    public $controllerNamespace = 'halo\block\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('content');
            $general = $menu->item('general');
            $general->add('Content Blocks', ['/admin/halo.block.admin/default/index'], 'fa fa-th');
    }
    
    public function migrationsPath()
    {
        return [
            $this->basePath . '/migrations'
        ];
    }
    
    
    
}
