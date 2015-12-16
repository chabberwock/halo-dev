<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Plugin: ' . $info['name'];
?>

<ul class="list-group">
    <li class="list-group-item"><strong>Build:</strong> <?= $info['build'] ?></li>
    <li class="list-group-item"><strong>Author:</strong> <?= $info['author'] ?></li>
    <li class="list-group-item"><strong>Website:</strong> <a href="<?= $info['homepage'] ?>"><?= $info['homepage'] ?></a></li>
    <li class="list-group-item"><strong>Description:</strong> <?= $info['description'] ?></li>
    <li class="list-group-item">
        <?= Html::a('Migrate Up', ['/admin/plugin/migrate','key'=>$id], [
            'class'=>'btn btn-primary', 
            'data'=>[
                'confirm'=> 'Are you sure that you want to run migration?'
            ]
        ]); ?>
    </li>
    
</ul>

<div>
    <?= $changelog ?>
</div>

