<?php

namespace core\user\admin;

class Module extends \app\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Users', 'url'=>['/user/admin'], 'icon'=>'fa fa-user']
    ];

}
