<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\block;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('halo.admin.contentMenu', ['halo\block\Plugin','onAdminContentMenu']);
    }
} 
  
?>
