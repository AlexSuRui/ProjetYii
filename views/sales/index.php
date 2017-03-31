<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\salesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel])?>
        
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete all sales',['truncate'],['class' => 'btn btn-danger', 
            'data'=>['confirm'=>'Are you sure you want to delete all the sales?','method'=>'post',]])?>
        <?= Html::a('Upload datas from a Excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
        <?= Html::a('Avanced search',['search'],['class' => 'btn btn-default'])?>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'floatHeader'=>true,
//        'floatHeaderOptions'=>['scrollingTop'=>'50'],
        'columns' => [ 
           
            ['class' => 'yii\grid\SerialColumn'],
                [
                    'label'=>'ID',
                    'attribute'=>'id',
                ],
                [
                    'label'=>'Year',
                    'attribute'=>'year',
                ],
                [
                    'label'=>'Quarter',
                    'attribute'=>'quarter',
                ],
                [
                    'label'=>'Country',
                    'attribute'=>'country',
                ],
                [
                    'label'=>'Sales',
                    'attribute'=>'sales',
                ],

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view} {update} {delete} {link}',
             'buttons' => [
                'link' => function ($url,$model,$key) {
                        return Html::a('Action');
                },
             ],
            ],
        ],
    ]); 
    ?>
    
    
 
  
</div>
