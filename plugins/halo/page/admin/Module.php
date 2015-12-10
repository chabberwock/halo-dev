<?php

namespace halo\page\admin;

class Module extends \halo\admin\AdminModule
{
    public $menuItems = [
        ['label'=>'Pages', 'url'=>['/admin/halo.page.admin'], 'icon'=>'fa fa-home']
    ];

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
