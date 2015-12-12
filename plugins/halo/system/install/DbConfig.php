<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\system\install;

class DbConfig extends \yii\base\Model
{
    public $host;
    public $databaseName;
    public $userName;
    public $password;
    
    public function rules() 
    {
        return [
            [['host','databaseName','userName','password'],'string']
        ];    
    }
}  
?>
