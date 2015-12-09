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
    abstract public function pluginInfo();
    
    public function migrationsPath()
    {
        return $this->getBasePath() . '/migrations';
    }
    
}
  
?>
