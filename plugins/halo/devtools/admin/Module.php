<?php

namespace halo\devtools\admin;
use admin\events\Menu;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'halo\devtools\admin\controllers';

    public function init()
    {
        parent::init();
        /** @var \admin\Ui */
        $ui = \Yii::$app->getModule('admin')->ui;
        $ui->contextMenu = 'devtools';
        $menu = $ui->menu('devtools');
        $general = $menu->item('general');
        $general->label = 'General';
        $general->add('Dashboard', ['/admin/halo.devtools.admin/default/index'], 'fa fa-home');
        $general->add('Gii', ['/gii'], 'fa fa-cog');
        $general->add('Extensions', ['/admin/halo.devtools.admin/default/extensions'], 'fa fa-info');
    }
}
