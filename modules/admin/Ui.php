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
    public $widgets = [];
    
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
    
    public function addWidget($place, $config)
    {
        if (!isset($this->widgets[$place])) {
            $this->widgets[$place] = [];
        }
        $this->widgets[$place][] = $config;
    }
    
    public function widgets($place)
    {
        if (isset($this->widgets[$place])) {
            $widgets = [];
            foreach ($this->widgets[$place] as $def) {
                if (class_exists($def['class'])) {
                    $widgets[] = Yii::createObject($def);    
                }
            }
            return $widgets;
        }
        return [];
    }
    
}
  
?>
