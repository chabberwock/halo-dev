<?php

namespace halo\user\admin;

class Module extends \halo\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Users', 'url'=>['/user/admin'], 'icon'=>'fa fa-user']
    ];

}
