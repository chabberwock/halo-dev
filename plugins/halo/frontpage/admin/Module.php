<?php

namespace halo\frontpage\admin;

class Module extends \admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Front Page', 'url'=>['/admin/halo.frontpage.admin'], 'icon'=>'fa fa-home']
    ];

}
