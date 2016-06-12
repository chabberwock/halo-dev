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
        $app->on('admin.ui', ['halo\frontpage\Module','onAdminUi']);
        $this->handleDefaultRoute($app);
    }
    
    
    public function handleDefaultRoute($app)
    {
        if (isset($app->defaultRoute)) {
            return;
        }
        $app->on(\yii\base\Application::EVENT_BEFORE_REQUEST, function ($event) use ($app) {
            $handler = new \halo\frontpage\events\FrontpageHandlers();
            $app->trigger('halo.frontpage', $handler);
            $activeRoute = isset($app->params['frontpageRoute']) ? $app->params['frontpageRoute'] : 'default';
            if (!isset($handler->handlers[$activeRoute])) {
                $activeRoute = 'default';
            }            
            if ($activeRoute == 'default') {
                if(empty($handler->handlers)) return;
                $app->defaultRoute = array_keys($handler->handlers)[0];
            } else {
                $app->defaultRoute = $activeRoute;
            } 
        });
    }
} 
  
?>
