<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\devtools;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.mainMenu', ['halo\devtools\Plugin','onAdminMainMenu']);
    }
} 
  
?>
