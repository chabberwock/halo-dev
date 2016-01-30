<?php

namespace halo\blog\admin;

use Yii;
use admin\events\Menu;

class Module extends \system\BasePlugin
{
    public function init()
    {
        parent::init();
        
        Yii::$app->view->params['sidebarMenu'] = [
            ['label'=>'Dashboard', 'url'=>['/admin/halo.blog.admin/'], 'icon'=>'fa fa-home']
        ];
    }
    
    // Configures admin interface. Event attached in Bootstrap.php
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        
        $content = $ui->menu('content');
        $general = $content->item('general');
        $general->add('Blog', ['/admin/halo.blog.admin/post/index'], 'fa fa-newspaper-o');

        $settings = $ui->menu('settings');
        $general = $settings->item('general');
        $general->add('Blog', ['/admin/halo.blog.admin/'], 'fa fa-newspaper-o');
    }

}
