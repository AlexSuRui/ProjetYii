<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-table-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create My Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'year',
            'quarter',
            'country',
            'sales',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
