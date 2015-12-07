<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel core\block\admin\models\BlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Block', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
