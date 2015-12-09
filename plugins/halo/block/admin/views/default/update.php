<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model halo\block\models\Block */

$this->title = 'Update Block: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
