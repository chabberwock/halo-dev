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
        $event = new \halo\admin\events\MainMenu();
        Yii::$app->trigger('halo.admin.mainMenu', $event);
        $this->items = $event->items;
    }
}  
?>
