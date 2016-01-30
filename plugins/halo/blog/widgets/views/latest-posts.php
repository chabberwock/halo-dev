<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
use yii\helpers\Html;
  
?>

<?php foreach ($posts as $post): ?>
    <div class="post" style="margin-bottom: 1em;">
        <h2><?= $post->title ?></h2>
        <div>
            <?= $post->content ?>
        </div>
    </div>
    
<?php endforeach ?>