<?php
use yii\helpers\Html;
use admin\widgets\HeaderMenu;
use admin\widgets\UserPanel;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">halo</span><span class="logo-lg">' . 'Halo CMS' . '</span>', ['/admin/'], ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <?= HeaderMenu::widget() ?>
            <?= UserPanel::widget() ?>
            
        </div>
    </nav>
</header>
