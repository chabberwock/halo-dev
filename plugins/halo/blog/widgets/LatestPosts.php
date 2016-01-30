<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\blog\widgets;
use halo\blog\models\Post;

class LatestPosts extends \yii\base\Widget
{
    public $count = 10;
    public function run()
    {
        $posts = Post::find()->orderBy(['id'=>SORT_DESC])->limit($this->count)->all();
        if ($posts !== null)
        {
            return $this->render('latest-posts.php', ['posts'=>$posts]);    
        }
    }
}
  
?>
