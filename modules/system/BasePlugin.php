<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace system;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;
use Yii;

abstract class BasePlugin extends \yii\base\Module
{
    public $depends = [];
    
    /**
    * @returns [] plugin information
    * 
    */
    public function pluginInfo()
    {
        $infoFile = $this->basePath . '/plugin.json';
        if (is_file($infoFile) && ($info = json_decode(file_get_contents($infoFile), true)) !== null) {
            return $info;
        }
        return [];
    }
    
    public function migrationsPath()
    {
        return []; //$this->getBasePath() . '/migrations';
    }
    
    public function headerMenu()
    {
        return [];    
    }
    
    public function setRuntimeConfig($config)
    {
        $path = $this->runtimeConfigDir();
        if (!is_dir($path)) {
            FileHelper::createDirectory($path);
        }
        $data = '<?php ' . "\nreturn " . VarDumper::export($config)  . ';';
        file_put_contents($path . DIRECTORY_SEPARATOR . 'config.php', $data);
    }
    
    public function getRuntimeConfig()
    {
        $configFile = $this->runtimeConfigDir() . DIRECTORY_SEPARATOR . 'config.php';
        if (is_file($conigFile)) {
            return require($configFile);
        } else {
            return [];
        }
    }
    
    private function runtimeConfigDir() 
    {
        return Yii::$app->runtimePath . DIRECTORY_SEPARATOR 
            . 'halo' . DIRECTORY_SEPARATOR 
            . 'plugins' . DIRECTORY_SEPARATOR
            . str_replace('.', DIRECTORY_SEPARATOR, $this->id);
    }
    
    
    
}
  
?>
