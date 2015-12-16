<?php

namespace halo\devtools\admin;
use admin\events\Menu;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'halo\devtools\admin\controllers';

    public function init()
    {
        parent::init();
        
        $menuEvent = new Menu;
        $menuEvent->items[] = ['label'=>'DEVELOPER TOOLS', 'options' =>['class'=>'header']];        

        $menuEvent->items[] = ['label'=>'Dashboard', 'url'=>['/admin/halo.devtools.admin'], 'icon'=>'fa fa-home'];
        $menuEvent->items[] = ['label'=>'Gii', 'url'=>['/gii'], 'icon'=>'fa fa-cog'];        
        $menuEvent->items[] = ['label'=>'Extensions', 'url'=>['/admin/halo.devtools.admin/default/extensions'], 'icon'=>'fa fa-info'];        

        Yii::$app->trigger('halo.devtools.menu', $menuEvent);
        
        Yii::$app->view->params['sidebarMenu'] = $menuEvent->items;
        

        // custom initialization code goes here
    }
}
