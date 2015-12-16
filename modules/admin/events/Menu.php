<?php
/**
* Triggered before rendering Main menu, Plugins can subscribe to 
* this event in bootstrap class
* ```
* $app->on('admin.mainMenu', callback)
* 
* 
*/

namespace admin\events;

use \yii\base\Event;

class Menu extends Event
{
    public $items = [];
}
?>
