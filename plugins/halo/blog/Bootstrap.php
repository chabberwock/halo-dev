<?php

namespace halo\blog;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.ui', ['halo\blog\admin\Module','onAdminUi']);
    }
    
}
