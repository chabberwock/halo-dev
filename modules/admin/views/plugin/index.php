<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;

$this->title = 'Plugins';
?>

<h4>Active plugins</h4>
<ul class="list-group">
    <?php foreach ($plugins as $id=>$plugin): ?>
    <li class="list-group-item">

        <div class="pull-right">
            <?= Html::a('deactivate',['/admin/plugin/deactivate','id'=>$id], ['class'=>'btn btn-warning btn-xs']) ?>
        </div>
        
        <h4 class="list-group-item-heading">
            <?= Html::a('<i class="'.$plugin['icon'].'"></i> ' . $plugin['name'], ['/admin/plugin/manage','id'=>$id]); ?>
        </h4>
        <div style="color: #666; font-size: 11px">
            <?= $plugin['description'] ?>
        </div>
    </li>
    <?php endforeach ?>
</ul>

<?php if (count($available) > 0): ?>
<h4>Available plugins</h4>
<ul class="list-group">
    <?php foreach ($available as $id=>$plugin): ?>
    <li class="list-group-item">
        <div class="pull-right">
            <?= Html::a('install',['/admin/plugin/install','id'=>$id], ['class'=>'btn btn-success btn-xs']) ?>
        </div>
        
        <h4 class="list-group-item-heading">
            <i class="<?= $plugin['icon'] ?>"></i> 
            <?= $plugin['name'] ?>
        </h4>
        <div style="color: #666; font-size: 11px">
            <?= $plugin['description'] ?>
        </div>
        
    </li>
    <?php endforeach ?>
</ul>
<?php endif ?>

