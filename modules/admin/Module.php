<?php

namespace admin;

use Yii;
use yii\helpers\ArrayHelper;
use admin\events\Menu;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $sidebarMenu = [];
    public $defaultRoute = 'content';
    

    public function behaviorso()
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
        if (!(Yii::$app instanceof \system\ConsoleApplication)) {
            $config = [];
            foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
                $namespace = explode('.', $pluginId)[0];
                $pluginPath = Yii::$app->pluginPath . DIRECTORY_SEPARATOR . str_replace('.',DIRECTORY_SEPARATOR, $pluginId);
                if (is_file($pluginPath . '/config-admin.php')) {
                    $config = ArrayHelper::merge($config, require($pluginPath . '/config-admin.php'));
                }
            }
            Yii::configure($this, $config);
            Yii::$app->themeManager->theme = 'admin';
            Yii::$app->themeManager->activate();
        }

        //Yii::$app->layoutPath = '@admin/views/layouts';       
        parent::init();
        // custom initialization code goes here
    }
    
    
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $menu = $ui->menu('main');
        $menu->add('Content', ['/admin/content/index'], 'fa fa-th');
        $menu->add('Settings', ['/admin/settings/index'], 'fa fa-cogs');
    }
    
    public function settingsMenu()
    {
        /** @var \admin\Ui */
        $ui = $this->ui;
        $ui->contextMenu = 'settings';
        $menu = $ui->menu('settings');
        $general = $menu->item('general');
        $general->label = 'General';
        $general->add('Plugins', ['/admin/plugin/index'], 'fa fa-bars');
    }
    
    public function contentMenu()
    {
        $this->ui->contextMenu = 'content';
        $content = $this->ui->menu('content');
        $general = $content->item('general');
        $general->label = 'General';
    }
    
}
