<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace admin\widgets;

use Yii;

class SidebarMenu extends Menu
{
    public $options = ['class' => 'sidebar-menu'];

    public function init()
    {
        $this->items = isset($this->view->params['sidebarMenu']) ? $this->view->params['sidebarMenu'] : [];
    }
}  
?>
