<?php

namespace halo\block\admin;

class Module extends \admin\AdminModule
{
    public $menuItems = [
        ['label'=>'HTML Blocks', 'url'=>['/admin/halo.block.admin'], 'icon'=>'fa fa-th']
    ];

}
