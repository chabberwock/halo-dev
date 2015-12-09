<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\admin\widgets;

use halo\admin\AdminModule;
use yii\helpers\ArrayHelper;
use Yii;

class Menu extends \dmstr\widgets\Menu
{
    public $options = ['class' => 'sidebar-menu'];
    
    public function init()
    {
        $this->items = Yii::$app->getModule('admin')->menuItems();
        foreach (Yii::$app->getModule('admin')->getModules() as $id=>$module)
        {
            if (is_array($module))
            {
                $module = Yii::$app->getModule('admin/'. $id);    
            }
            if ($module instanceof AdminModule)
            {
                $this->items = ArrayHelper::merge($this->items, Yii::$app->getModule('admin/'. $id)->menuItems());                
            }
        }
    }
}
?>
