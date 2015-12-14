<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel halo\page\admin\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('halo/page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['class' => 'col-md-1']
            ],
            'title',
            [
                'attribute' => 'updated_at',
                'contentOptions' => ['class' => 'col-md-2'],
                'value' => function ($model) {
                    return date("Y-m-d H:i:s", $model->updated_at);
                }
            ],
            // 'html:ntext',
            // 'meta_keywords',
            // 'meta_description',

            [
                'class' => 'yii\grid\ActionColumn',   
                'contentOptions' => ['class' => 'col-md-1'],
            
            ],
        ],
    ]); ?>

</div>
