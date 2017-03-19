<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\vm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\salesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Virtual Machines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
            // get all the attributes of sales
            $model = new vm();
            $champs = $model->attributes();
//            $visible=array();
            // use a loop to get the values of swithinput via customize.php
            $result = array();
            foreach ($champs as $champ){
                $v = isset($_POST[$champ])?$_POST[$champ] : false;
                array_push($result, ['attribute'=>$champ, 'visible'=>$v]);
            }            
            Yii::info($champs);
            Yii::info($result);
            Yii::info($array);
            print_r($array)?>
            
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
//        'showOnEmpty' => false,
        'columns' => array_merge([['class' => 'yii\grid\SerialColumn']],$result),
    ]); 
    ?>
 
  
</div>
<?php


