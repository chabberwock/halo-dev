<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\admin\widgets;

use Yii;

class SidebarMenu extends Menu
{
    public $options = ['class' => 'sidebar-menu'];

    public function init()
    {
        $this->items = Yii::$app->getModule('halo.admin')->sidebarMenu;
    }
}  
?>
