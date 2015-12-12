<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\system;

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
    
    
    
}
  
?>
