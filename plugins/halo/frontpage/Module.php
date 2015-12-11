<?php

namespace halo\frontpage;
use halo\system\BasePlugin;

class Module extends BasePlugin
{

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function headerMenu()
    {
        return [
            ['label'=>'Front Page', 'url'=>['/halo.admin/halo.frontpage.admin'], 'icon'=>'fa fa-home']
        ];
    }
}
