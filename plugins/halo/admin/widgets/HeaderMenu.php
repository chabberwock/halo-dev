<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\admin\widgets;

use yii\helpers\ArrayHelper;
use Yii;

class HeaderMenu extends Menu
{
    public $options = ['class' => 'nav navbar-nav'];

    public function init()
    {
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $this->items = ArrayHelper::merge($this->items, Yii::$app->getModule($pluginId)->headerMenu());
        }
    }
}  
?>
