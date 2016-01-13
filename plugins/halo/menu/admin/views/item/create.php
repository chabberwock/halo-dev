<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model halo\menu\models\MenuItem */

$this->title = 'Create Menu Item';
$this->params['breadcrumbs'][] = ['label' => 'Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-item-create">

    <?= $this->render('_form', [
        'model' => $model,
        'menuId' => $menuId,
    ]) ?>

</div>
