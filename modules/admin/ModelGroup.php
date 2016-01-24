<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
* 
* if POST create models from post request
* if get create models from database
*/
namespace admin;
use \Yii;
use yii\base\Model;

trait ModelGroup
{
    public function getModelGroup($className, $addKey, $removeKey, $newModel = null)
    {
        $items = [];
        $postData = Yii::$app->request->post(basename($className));
        if ($postData !== null) {
            for ($i=0; $i < count($postData); $i++) 
            {
                $items[$i] = new $className;
            }
            Model::loadMultiple($items, Yii::$app->request->post());
        }
        
        if (Yii::$app->request->post($addKey) !== null)
        {
            if (is_callable($newModel))
            {
                $items[] = $newModel();
            }
            else
            {
                $items[] = new $className;
            }
            
        }
        
        if (Yii::$app->request->post($removeKey) !== null)
        {
            unset($items[Yii::$app->request->post($removeKey)]);
        }
        
        return $items;
    }

}
  
?>
