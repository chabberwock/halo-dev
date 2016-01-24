<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
namespace halo\user\admin\widgets;

class MiniCounter extends \yii\base\Widget
{
    public function run()
    {
        return $this->render('minicounter/index');
    }
}
  
?>
