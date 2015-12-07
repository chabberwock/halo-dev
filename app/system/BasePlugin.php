<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace app\system;

abstract class BasePlugin extends \yii\base\Module
{
    /**
    * @returns [] plugin information
    * 
    */
    abstract public function pluginInfo();
    
    public function migrationsPath()
    {
        return $this->getBasePath() . '/migrations';
    }
    
}
  
?>
