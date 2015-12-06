<?php

namespace core\frontpage\admin;

class Module extends \app\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Front Page', 'url'=>['/admin/frontpage'], 'icon'=>'fa fa-home']
    ];

}
