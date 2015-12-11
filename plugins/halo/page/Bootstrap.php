<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\page;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('halo.admin.mainMenu', ['halo\page\Module','onAdminMainMenu']);
    }
} 
  
?>
