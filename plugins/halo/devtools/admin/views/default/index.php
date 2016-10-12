<?php
use yii\bootstrap\Nav;    
?>
<div class="devtools-default-index">
    <?= Nav::widget([
        'items' => [
            ['label'=>'Plugin generator', 'url'=>['/gii/plugin']]
        ] 
    ]) ?>
</div>
