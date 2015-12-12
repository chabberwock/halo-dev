<?php

namespace halo\admin\controllers;

use halo\system\models\Plugin;
use halo\system\BasePlugin;
use yii\filters\VerbFilter;
use Yii;

class PluginController extends \yii\web\Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('halo.admin')->settingsMenu();
    }
    
    public function actionDisable()
    {
        return $this->render('disable');
    }

    public function actionIndex()
    {
        $plugins = [];
        foreach (Yii::$app->pluginManager->activePlugins as $pluginId) {
            $plugins[$pluginId] = Yii::$app->getModule($pluginId)->pluginInfo();
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
        $this->redirect(['/halo.admin/plugin/migrate','key'=>$id]);
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
                $ctrl = new \halo\system\MigrationWrapper('migrate',$this->module);
                $ctrl->migrationPath = \Yii::getAlias($path);
                ob_start();
                $ctrl->runAction('up');
                $result .= ob_get_clean();
            }
        return $this->render('migrate', ['result'=>$result]);
    }

}
