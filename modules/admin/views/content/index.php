<?php
/* @var $this yii\web\View */

?>

<div class="row">
    <?php foreach ($miniWidgets as $idx=>$widget): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <?= $widget->run() ?>
        </div>
        <?php if ($idx % 4 == 0 && $idx > 0): ?>
            </div><div class="row">
        <?php endif ?>
    <?php endforeach ?>
</div>
