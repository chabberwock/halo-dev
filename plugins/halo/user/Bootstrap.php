<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\user;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.ui', ['halo\user\Plugin','onAdminUi']);
    }
} 
  
?>
