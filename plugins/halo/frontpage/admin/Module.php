<?php

namespace halo\frontpage\admin;

class Module extends \halo\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Front Page', 'url'=>['/halo.admin/halo.frontpage.admin'], 'icon'=>'fa fa-home']
    ];

}
