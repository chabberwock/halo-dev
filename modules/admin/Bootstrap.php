<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace admin;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.ui', ['admin\Module', 'onAdminUi']);
    }
} 
  
?>
