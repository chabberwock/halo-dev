<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            ['attribute'=>'created_at', 'value'=>function($model){
                return date('Y-m-d H:i:s',$model->created_at);
            }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
