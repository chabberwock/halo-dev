<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\admin;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('halo.admin.mainMenu', ['halo\admin\Module','onAdminMainMenu']);
    }
} 
  
?>
