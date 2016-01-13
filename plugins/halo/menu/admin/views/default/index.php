<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'title',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->title, ['/admin/halo.menu.admin/item', 'id'=>$model->id]);
                }
            
            ],
            'id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
