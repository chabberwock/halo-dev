<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace core\block\widgets;
use core\block\models\Block as Model;

class Block extends \yii\base\Widget
{
    public $id;
    
    public function run()
    {
        $model = Model::findOne(['id'=>$this->id]);
        if ($model !== null) {
            return $this->render('block', ['model'=>$model]);
        }
    }
    
}
  
?>
