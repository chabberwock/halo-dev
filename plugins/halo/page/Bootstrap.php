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
        $app->on('admin.ui', ['halo\page\Module','onAdminUi']);
        $app->on('halo.frontpage', 
            function ($event) 
            {
                $event->handlers['halo.page/default/index'] = 'Static pages plugin';
            }
        );
        
    }
} 
  
?>
