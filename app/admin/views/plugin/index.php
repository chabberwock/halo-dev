<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Plugins';
?>
    <div class="row">
    
    <?php foreach ($plugins as $id=>$plugin): ?>
    <div class="col-md-4">
        <div class="info-box">
            <?= Html::a('<span class="info-box-icon bg-aqua"><i class="' . $plugin['icon'] . '"></i></span>', ['/admin/plugin/view', 'key'=>$id]) ?>
            <div class="info-box-content">
                <div class="info-box-text" style="font-weight: bold;"><?= $plugin['name'] ?></div>
                <div style="color: #666; font-size: 11px">
                    <div>Build: <?= $plugin['build'] ?></div>
                    <div>Author: <?= $plugin['author'] ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    </div>
