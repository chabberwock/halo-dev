<?php

namespace core\block\admin;

class Module extends \app\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'HTML Blocks', 'url'=>['/admin/core-block-admin'], 'icon'=>'fa fa-th']
    ];

}
