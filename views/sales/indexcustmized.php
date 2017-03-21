<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\sales;
/* @var $this yii\web\View */
/* @var $searchModel app\models\salesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
            // get all the attributes of sales

            
            $model = new Sales();
            $champs = $model->attributes();
            $array = array();
            // use a loop to get the values of swithinput via customize.php
            foreach ($champs as $champ){
                array_push($array, isset($_POST[$champ])?$_POST[$champ] : false);    
            }
            ?>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete all sales',['truncate'],['class' => 'btn btn-danger', 
            'data'=>['confirm'=>'Are you sure you want to delete all the sales?','method'=>'post',]])?>
        <?= Html::a('Upload datas from a Excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
        <?= Html::a('Avanced search',['search'],['class' => 'btn btn-default'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader' => true,
        'showOnEmpty' => false,
        'columns' => [ 
            // it's better to find a method with loop
            ['class' => 'yii\grid\SerialColumn'],
                [
                    'label'=>'ID',
                    'attribute'=>'id',
                    'visible'=>$array[0],
                ],
                [
                    'label'=>'Year',
                    'attribute'=>'year',
                    'visible'=>$array[1],
                ],
                [
                    'label'=>'Quarter',
                    'attribute'=>'quarter',
                    'visible'=>$array[2],
                ],
                [
                    'label'=>'Country',
                    'attribute'=>'country',
                    'visible'=>$array[3],
                ],
                [
                    'label'=>'Sales',
                    'attribute'=>'sales',
                    'visible'=>$array[4],
                ],
            // This is for the action column
            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view} {update} {delete} {link}',
             'buttons' => [
                'link' => function ($url,$model,$key) {
                },
             ],
            ],
        ],
    ]); 
    ?>
 
  
</div>
<?php


