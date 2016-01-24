<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace admin;
use Yii;
use yii\base\Event;

class Ui extends \yii\base\Component
{
    public $menu;
    /**
    * @var string id of currently active context menu
    */
    public $contextMenu = 'context';
    
    public function init()
    {
        parent::init();
        $this->menu = new MenuItem();
        Yii::$app->trigger('admin.ui', new Event(['sender'=>$this]));   
        
    }
    
    /**
    * Returns root menuitem for given menu id
    * 
    * @param mixed $id
    * @return MenuItem
    */
    public function menu($id)
    {
        return $this->menu->item($id);
    }
}
  
?>
