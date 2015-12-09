<?php

namespace app\admin\controllers;

use app\system\models\Plugin;
use app\system\BasePlugin;
use yii\filters\VerbFilter;
use Yii;

class PluginController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'migrate' => ['post'],
                ],
            ],
        ];
    }

    public function actionDisable()
    {
        return $this->render('disable');
    }

    public function actionIndex()
    {
        return $this->render('index', ['plugins'=>$this->getPlugins()]);
    }
    
    private function getPlugins()
    {
        $modules = Yii::$app->getModules();
        $plugins = [];
        foreach (array_keys($modules) as $moduleId) {
            $module = Yii::$app->getModule($moduleId);
            if ($module instanceof BasePlugin) {
                $plugins[$moduleId] = $module->pluginInfo();
            }    
        }
        return $plugins;
    }
    
    public function actionView($key)
    {
        $plugins = $this->getPlugins();
        $plugin = $plugins[$key];
        return $this->render('view', ['plugin'=>$plugin, 'key'=>$key]);
    }
    
    public function actionMigrate($key)
    {
        $plugin = Yii::$app->getModule($key);
        $result = '';
        $migrationPaths = $plugin->migrationsPath();
        if (is_string($migrationPaths)) {
            $migrationPaths = [$migrationPaths];
        } else {
            foreach ($plugin->migrationsPath() as $path) {
                $ctrl = new \app\admin\MigrationWrapper('migrate',$this->module);
                $ctrl->migrationPath = \Yii::getAlias($path);
                ob_start();
                $ctrl->runAction('up');
                $result .= ob_get_clean();
            }
        }

        return $this->render('migrate', ['result'=>$result]);
    }

}
