<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace admin\widgets;

use Yii;

class SidebarMenu extends Menu
{
    public $options = ['class' => 'sidebar-menu'];

    public function init()
    {
        $this->items = isset($this->view->params['sidebarMenu']) ? $this->view->params['sidebarMenu'] : [];
    }
    
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            $arrayRoute = explode('/', ltrim($route, '/'));
            $arrayThisRoute = explode('/', $this->route);
            if ($arrayRoute[0] !== $arrayThisRoute[0]) {
                return false;
            }
            if (isset($arrayRoute[1]) && $arrayRoute[1] !== $arrayThisRoute[1]) {
                return false;
            }
            if (isset($arrayRoute[2]) && $arrayRoute[2] !== $arrayThisRoute[2]) {
                return false;
            }
            if (isset($arrayRoute[3]) && $arrayRoute[3] !== $arrayThisRoute[3]) {
                return false;
            }

            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
    
}  
?>
