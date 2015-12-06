<?php

namespace core\page\admin;

class Module extends \app\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Pages', 'url'=>['/admin/pageadmin'], 'icon'=>'fa fa-home']
    ];

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
