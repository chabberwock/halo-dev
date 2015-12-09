<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace app\controllers;
use app\models\DbConfig;
use Yii;

class SiteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DbConfig;
        
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $this->createDbConfig($model);
            $this->importDump($model);
            return $this->redirect(['site/success']);        
        }
        return $this->render('index', ['model'=>$model]);
    }
    
    public function actionSuccess()
    {
        return $this->render('success');
    }

    private function createDbConfig(DbConfig $model)
    {
        $settings = [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host='.$model->host.';dbname=' . $model->databaseName,
            'username' => $model->userName,
            'password' => $model->password,
            'charset' => 'utf8',
        ];
        $fileData = '<?php ' . "\n" . 'return ' . var_export($settings, true) . ';';
        file_put_contents(Yii::$app->params['haloPath'] . '/config/db.php', $fileData);
    }
    
    private function importDump($model)
    {
        $db = Yii::createObject(require(Yii::$app->params['haloPath'] . '/config/db.php'));
        $queries = explode(';', file_get_contents(Yii::$app->params['databaseDump']));
        foreach ($queries as $sql) {
            if (trim($sql) == '') {
                break;
            }
            try {
                $db->createCommand($sql)->execute();        
            } catch (\Exception $e) {
                echo 'Failed on ' . $sql;
            }
        }
    }
    
    public function actionError()
    {
        return 'error!';
    }
    
}  
?>
