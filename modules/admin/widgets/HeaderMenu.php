<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace admin\widgets;

use yii\helpers\ArrayHelper;
use Yii;

class HeaderMenu extends Menu
{
    public $options = ['class' => 'nav navbar-nav'];

    public function init()
    {
        $event = new \admin\events\Menu();
        Yii::$app->trigger('admin.mainMenu', $event);
        $this->items = $event->items;
    }
}  
?>
