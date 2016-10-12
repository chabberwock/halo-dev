<?php
use yii\bootstrap\Nav;    
?>
<div class="devtools-default-index">
    <h1>Developer tools</h1>
    <?= Nav::widget([
        'items' => [
            ['label'=>'Plugin generator', 'url'=>['/gii/plugin']]
        ] 
    ]) ?>
</div>
