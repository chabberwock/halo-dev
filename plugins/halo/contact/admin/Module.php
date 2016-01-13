<?php

namespace halo\contact\admin;

use Yii;
use admin\events\Menu;

class Module extends \system\BasePlugin
{
    public function init()
    {
        parent::init();
        
        Yii::$app->view->params['sidebarMenu'] = [
            ['label'=>'Dashboard', 'url'=>['/admin/halo.contact.admin/'], 'icon'=>'fa fa-home']
        ];
    }
    
    // Displays plugin link in the header. Event attached in Bootstrap.php
    public static function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Contact Form', 'url'=>['/admin/halo.contact.admin/'], 'icon'=>'fa fa-mail'];
    }

    // displays plugin link in the content section of admin. Event attached in Bootstrap.php
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Contact Form', 'options' =>['class'=>'header']];        
        $event->items[] = ['label'=>'Dashboard', 'url'=>['/admin/halo.contact.admin/'], 'icon'=>'fa fa-mail'];
    }

    // displays plugin link in the content section of admin. Event attached in Bootstrap.php
    public static function onAdminSettingsMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Contact Form', 'options' =>['class'=>'header']];        
        $event->items[] = ['label'=>'Dashboard', 'url'=>['/admin/halo.contact.admin/'], 'icon'=>'fa fa-mail'];
    }
    
}
