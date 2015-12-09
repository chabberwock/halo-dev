<?php

namespace halo\frontpage\admin;

class Module extends \halo\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Front Page', 'url'=>['/admin/frontpage'], 'icon'=>'fa fa-home']
    ];

}
