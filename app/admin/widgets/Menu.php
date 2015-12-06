<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace app\admin\widgets;

use Yii;

class Menu extends \dmstr\widgets\Menu
{
    public $options = ['class' => 'sidebar-menu'];
    
    public function init()
    {
        $this->items = Yii::$app->getModule('admin')->getMenuItems();        
    }
}
?>
