<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model halo\page\models\Page */

$this->title = Yii::t('halo/page', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('halo/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
