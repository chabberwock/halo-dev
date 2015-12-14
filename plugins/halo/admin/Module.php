<?php

namespace halo\admin;

use Yii;
use yii\helpers\ArrayHelper;
use halo\admin\events\Menu;
use yii\filters\AccessControl;

class Module extends \halo\system\BasePlugin
{
    public $sidebarMenu = [];
    public $defaultRoute = 'content';
    

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->getIsAdmin();
                        },
                    ],
                ],
            ],
        ];
    }

    public function init()
    {
        $config = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $namespace = explode('.', $pluginId)[0];
            $pluginPath = Yii::$app->pluginPath . DIRECTORY_SEPARATOR . str_replace('.',DIRECTORY_SEPARATOR, $pluginId);
            if (is_file($pluginPath . '/config-admin.php')) {
                $config = ArrayHelper::merge($config, require($pluginPath . '/config-admin.php'));
            }
        }
        Yii::configure($this, $config);
        Yii::$app->layoutPath = '@halo/admin/views/layouts';       
        parent::init();
        // custom initialization code goes here
    }
    
    
    public static function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'Content', 'url'=>['/halo.admin/content/index'], 'icon'=>'fa fa-th'];
        $event->items[] = ['label'=>'Settings', 'url'=>['/halo.admin/settings/index'], 'icon'=>'fa fa-cogs'];
    }
    
    public function settingsMenu()
    {
        $menuEvent = new Menu;
        $menuEvent->items[] = ['label'=>'Dashboard', 'url'=>['/halo.admin/settings/index'], 'icon'=>'fa fa-home'];

        Yii::$app->trigger('halo.admin.settingsMenu', $menuEvent);

        $menuEvent->items[] = ['label'=>'PLUGINS', 'options' =>['class'=>'header']];        
        
        $menuEvent->items[] = ['label'=>'Overview', 'icon'=>'fa fa-home', 'url'=>['/halo.admin/plugin/index']];
        $menuEvent->items[] = ['label'=>'Manage', 'icon'=>'fa fa-wrench', 'url'=>'#', 'items' => $this->activePluginsMenu()];
        
        Yii::$app->view->params['sidebarMenu'] = $menuEvent->items;
    }
    
    public function activePluginsMenu()
    {
        $pluginLinks = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $info = Yii::$app->getModule($pluginId)->pluginInfo();
            $pluginLinks[] = ['label' => '<i class="' .$info['icon'].'"></i> ' . $info['name'], 'url'=>['/halo.admin/plugin/manage', 'id'=>$pluginId], 'encode'=>false];
        }
        return $pluginLinks;
        
    }
    
    public function contentMenu()
    {
        $menuEvent = new Menu;
        $menuEvent->items[] = ['label'=>'Dashboard', 'url'=>['/halo.admin/content/index'], 'icon'=>'fa fa-home'];
        Yii::$app->trigger('halo.admin.contentMenu', $menuEvent);
        Yii::$app->view->params['sidebarMenu'] = $menuEvent->items;
    }
    
}
