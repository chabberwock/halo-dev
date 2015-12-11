<?php
/**
* Triggered before rendering Main menu, Plugins can subscribe to 
* this event in bootstrap class
* ```
* $app->on('halo.admin.mainMenu', callback)
* 
* 
*/

namespace halo\admin\events;

use \yii\base\Event;

class MainMenu extends Event
{
    public $items = [];
}
?>
