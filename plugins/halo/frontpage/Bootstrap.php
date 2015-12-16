<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\frontpage;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.contentMenu', ['halo\frontpage\Module','onAdminContentMenu']);
    }
} 
  
?>
