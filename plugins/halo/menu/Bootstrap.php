<?php

namespace halo\menu;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.contentMenu', ['halo\menu\admin\Module','onAdminContentMenu']);
    }
    
}
