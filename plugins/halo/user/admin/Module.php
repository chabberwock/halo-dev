<?php

namespace halo\user\admin;

use Yii;

class Module extends \admin\AdminModule
{
    public function contextMenu()
    {
        $ui = Yii::$app->getModule('admin')->ui;
        $ui->contextMenu = 'user';
    }
    
}
