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
        /** @var \admin\Ui */
        $ui = Yii::$app->getModule('admin')->ui;
        $menu = $ui->menu('main')->toArray();   
        $this->items = $menu['items'];
    }
}  
?>
