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
        $app->on('admin.ui', ['halo\devtools\Plugin','onAdminUi']);
        
    }
} 
  
?>
