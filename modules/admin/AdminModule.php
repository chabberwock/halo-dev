<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace admin;

abstract class AdminModule extends \yii\base\Module
{
    public $title = 'Unnamed Module';
    public $menuItems = [];
    
    public function menuItems()
    {
        return $this->menuItems;
    }
    
}

?>
