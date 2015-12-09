<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace app\models;

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
