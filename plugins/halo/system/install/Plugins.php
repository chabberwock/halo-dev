<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\system\install;

class Plugins extends \yii\base\Model
{
    public $items;
    
    public function rules() 
    {
        return [
            ['items','safe']
        ];    
    }
    
    public function attributeLabels()
    {
        return [
            'items' => 'Plugins'
        ];
    }
}  
?>
