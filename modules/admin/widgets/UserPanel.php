<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace admin\widgets;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Yii;

class UserPanel extends \yii\base\Widget
{

    public function run()
    {
        $user = Yii::$app->user->getIdentity();

        if($user)
        {
            return $this->render('userpanel/index', ['user' => $user]);
        }
        
    }
    
}
?>
