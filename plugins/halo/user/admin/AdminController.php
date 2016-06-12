<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\user\admin;

use admin\events\Menu;
use Yii;

class AdminController extends \dektrium\user\controllers\AdminController
{
    public $layout = '@admin/views/layouts/main';
    
    public function init()
    {
        Yii::$app->getModule('admin/halo.user')->contextMenu();

        parent::init();
        
        $menuEvent = new Menu;
        
        $menuEvent->items[] = ['label'=>'Users', 'options' =>['class'=>'header']];        

        $menuEvent->items[] = ['label'=>'Home', 'url'=>['/user/admin/index'], 'icon'=>'fa fa-home'];
        $menuEvent->items[] = ['label'=>'Add user', 'url'=>['/user/admin/create'], 'icon'=>'fa fa-plus'];

        Yii::$app->trigger('halo.devtools.menu', $menuEvent);
        
        Yii::$app->view->params['sidebarMenu'] = $menuEvent->items;
        
        
    }
    
}  
?>
