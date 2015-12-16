<?php

namespace system\controllers;

use system\install\DbConfig;
use system\install\Plugins;
use system\MigrationWrapper;
use Yii;
use yii\helpers\ArrayHelper;

class InstallController extends \yii\web\Controller
{
    public function init()
    {
        if (!defined('HALO_INSTALLER')) {
            die('you need installer to perform install');
        }
    }
    
    public function actionError()
    {
        return $this->render('error');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPlugins()
    {
        $model = new Plugins;
        $available = Yii::$app->pluginManager->availablePlugins;
        
        // system plugins will be installed anyway, do not ask
        $system = Yii::$app->pluginManager->systemPlugins;
        foreach ($system as $id) {
            unset($available[$id]);
        }
        $plugins = ArrayHelper::map($available, 'id','name');
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            foreach ($model->items as $id) {
                Yii::$app->pluginManager->activate($id);    
            }
            return $this->redirect(['/system/install/migrate']);
        }
        
        return $this->render('plugins', ['model'=>$model, 'plugins'=>$plugins]);
    }
    
    public function actionMigrate()
    {
        ob_start();
        foreach (Yii::$app->pluginManager->activePlugins as $id)
        {
            $plugin = Yii::$app->getModule($id);
            foreach ($plugin->migrationsPath() as $path) {
                $migrator = new MigrationWrapper('migrate',$this->module, ['db'=>Yii::$app->db]);
                $migrator->migrationPath = $path;
                $migrator->actionUp();
            }
        }
        $response = ob_get_clean();
        return $this->render('migrate', ['response'=>$response]);
    }

    public function actionRequirements()
    {
        return $this->render('requirements');
    }
    
    

    public function actionDb()
    {
        $model = new DbConfig;
        
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $settings = [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host='.$model->host.';dbname=' . $model->databaseName,
                'username' => $model->userName,
                'password' => $model->password,
                'charset' => 'utf8',
            ];
            $this->saveConfig(Yii::$app->basePath . '/config/db.php', $settings);
            return $this->redirect(['/system/install/plugins']);        
        }
        return $this->render('db', ['model'=>$model]);
    }

    private function saveConfig($fileName, array $config)
    {
        $fileData = '<?php ' . "\n" . 'return ' . var_export($config, true) . ';';
        file_put_contents($fileName, $fileData);
    }
    
    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionThemes()
    {
        return $this->render('themes');
    }

}
