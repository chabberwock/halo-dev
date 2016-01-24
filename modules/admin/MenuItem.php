<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace admin;
use yii\base\ArrayableTrait;

class MenuItem extends \yii\base\Object
{
    use ArrayableTrait;
    
    public $label;
    public $url;
    public $icon;
    public $options;
    public $items = [];
    public function add($label, $url = '#', $icon = '', $options = [])
    {
        $item = new MenuItem(['label'=>$label, 'url'=>$url, 'icon'=>$icon, 'options'=>$options]);
        $this->items[] = $item;
        return $item;
    }
    
    public function item($id)
    {
        if (!isset($this->items[$id])) {
            $this->items[$id] = new MenuItem();
        }
        return $this->items[$id];
    }
    
    
}

?>
