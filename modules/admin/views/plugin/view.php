<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Plugin: ' . $plugin['name'];
?>

<p>Build: <?= $plugin['build'] ?></p>
<p>Author: <?= $plugin['author'] ?></p>
<p>Homepage: <a href="<?= $plugin['homepage'] ?>"><?= $plugin['homepage'] ?></a></p>
<h4>Description</h4>
<?= $plugin['description'] ?>

<p style="margin-top: 2em;"><?= Html::a('Migrate Up', ['/admin/plugin/migrate','key'=>$key], [
    'class'=>'btn btn-primary', 
    'data'=>[
        'method'=>'post', 
        'confirm'=> 'Are you sure that you want to run migration?'
    ]
]); ?>
</p>