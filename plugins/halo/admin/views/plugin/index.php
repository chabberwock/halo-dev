<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;

$this->title = 'Plugins';
?>

<div class="row">
    <div class="col-md-6">
        <h4>Installed plugins</h4>
        <?php foreach ($plugins as $id=>$plugin): ?>
        <div class="info-box">
            <?= Html::a('<span class="info-box-icon bg-green"><i class="'.$plugin['icon'].'"></i></span>', ['/halo.admin/plugin/manage','id'=>$id]); ?>
            <div class="info-box-content">
                <div class="info-box-text" style="font-weight: bold;"><?= $plugin['name'] ?></div>
                <div style="color: #666; font-size: 11px">
                    <div>Build: <?= $plugin['build'] ?></div>
                    <div>Author: <?= $plugin['author'] ?></div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>
    <div class="col-md-6">
        <h4>Available plugins</h4>
        <?php foreach ($available as $id=>$plugin): ?>
        <div class="info-box">
            <?= Html::a('<span class="info-box-icon bg-default"><i class="'.$plugin['icon'].'"></i></span>', ['/halo.admin/plugin/install','id'=>$id]); ?>
            <div class="info-box-content">
                <div class="info-box-text" style="font-weight: bold;"><?= $plugin['name'] ?></div>
                <div style="color: #666; font-size: 11px">
                    <div>Build: <?= $plugin['build'] ?></div>
                    <div>Author: <?= $plugin['author'] ?></div>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</div>