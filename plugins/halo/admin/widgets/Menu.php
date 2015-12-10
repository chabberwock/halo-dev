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
        $this->items = Yii::$app->getModule('halo.admin')->menuItems();
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $this->items = ArrayHelper::merge($this->items, Yii::$app->getModule($pluginId)->adminMenu());
        } 
    }
}
?>
