<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\menu\widgets;

use halo\menu\models\MenuItem;
use yii\helpers\ArrayHelper;

class Nav extends \yii\bootstrap\Nav
{
    public $menu = 'main';
    
    public function init()
    {
        parent::init();
        $models = MenuItem::find()->where(['menu_id'=>$this->menu])->orderBy(['order_id'=>SORT_ASC])->all();
        $items = [];
        // top menu items
        foreach ($models as $model) {
            if ($model->parent_id == 0) {
                $items[$model->id] = ['label'=>$model->title, 'url'=>$this->parseRoute($model->route)];
            }
        }
        
        foreach ($models as $model) {
            if (isset($items[$model->parent_id])) {
                $items[$model->parent_id]['items'][] = ['label'=>$model->title, 'url'=>$this->parseRoute($model->route)];
            }
        }
        $this->items = ArrayHelper::merge($items, $this->items);          
    }
    
    private function parseRoute($route)
    {
        $parsed = json_decode($route);
        if ($parsed === null) {
            return $route;
        } else {
            return $parsed;
        }
    } 
    
    
}
  
?>
