<?php

namespace admin\controllers;

use Yii;
use yii\base\Exception;

class PluginController extends \yii\web\Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('admin')->settingsMenu();
    }
    
    public function actionDeactivate($id)
    {
        Yii::$app->pluginManager->deactivate($id);
        return $this->redirect(['/admin/plugin/index']);
    }

    public function actionIndex()
    {
        $plugins = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId)
        {
            $plugin = Yii::$app->getModule($pluginId);

            if(!$plugin)
            {
                throw new Exception("Plugin '{$pluginId}' not found");
            }

            $plugins[$pluginId] = $plugin->pluginInfo();
        }
        $available = [];
        foreach (Yii::$app->pluginManager->availablePlugins as $pluginId=>$info) {
            if (in_array($pluginId, Yii::$app->pluginManager->activePlugins)) {
                // skip installed plugins
                continue;
            }
            
            $available[$pluginId] = $info;
        }
        
        return $this->render('index', ['plugins'=>$plugins, 'available'=>$available]);
    }
    
    public function actionInstall($id)
    {
        Yii::$app->pluginManager->activate($id);
        $this->redirect(['/admin/plugin/migrate','key'=>$id]);
    }
    
    public function activePluginsMenu()
    {
        $pluginLinks = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $info = Yii::$app->getModule($pluginId)->pluginInfo();
            $pluginLinks[] = ['label' => '<i class="' .$info['icon'].'"></i> ' . $info['name'], 'url'=>['/admin/plugin/manage', 'id'=>$pluginId], 'encode'=>false];
        }
        return $pluginLinks;
        
    }
    
    private function getPlugins()
    {
        $plugins = [];
        $mods = Yii::$app->getModules();
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $plugins[$pluginId] = Yii::$app->getModule($pluginId)->pluginInfo();
        }
        return $plugins;
    }
    
    public function actionManage($id)
    {
        $plugin = Yii::$app->getModule($id);
        $info = $plugin->pluginInfo();
        
        $changelog = '';
        if (is_file($plugin->basePath . '/CHANGELOG.md')) {
            $md = new \cebe\markdown\GithubMarkdown();
            $changelog = $md->parse(file_get_contents($plugin->basePath . '/CHANGELOG.md'));
        }
        return $this->render('manage', ['info'=>$info, 'changelog'=>$changelog, 'id'=>$id]);
    }
    
    public function actionMigrate($key)
    {
        $plugin = Yii::$app->getModule($key);
        $result = '';
        $migrationPaths = $plugin->migrationsPath();
        if (is_string($migrationPaths)) {
            $migrationPaths = [$migrationPaths];
        }
            foreach ($migrationPaths as $path) {
                $ctrl = new \system\MigrationWrapper('migrate',$this->module);
                $ctrl->migrationPath = \Yii::getAlias($path);
                ob_start();
                $ctrl->runAction('up');
                $result .= ob_get_clean();
            }
        return $this->render('migrate', ['result'=>$result]);
    }

}
