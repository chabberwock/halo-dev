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
        $app->on('admin.mainMenu', ['halo\user\Plugin','onAdminMainMenu']);
    }
} 
  
?>
