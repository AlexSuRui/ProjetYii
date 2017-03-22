<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\vm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\salesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Virtual Machines';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="vm-index" >

        <h1><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]);
                // get all the attributes of sales
                    $result = array();
                    $cookies1 = Yii::$app->request->cookies;
                    if (($cookie = $cookies1->get('result')) !== null){
                        $result = $cookie->value;
                    } else {
                        $model = new vm();
                        $champs = $model->attributes();
                    // use a loop to get the values of swithinput via customize.php
                        foreach ($champs as $champ){
        //              $v = isset($_POST[$champ])?$_POST[$champ] : false;
                            $v = isset($_POST[$champ])?true : false;
                            array_push($result, ['attribute'=>$champ, 'visible'=>$v]);
                        }   
                       $cookies =  Yii::$app->response->cookies;
                       $cookies -> add(new \yii\web\Cookie([
                           'name'=>'result',
                           'value' => $result,
                       ]));
                    }
                   
//                    $cache->set('result',$results);
//                    Yii::error($cache);
//                }
        
                Yii::info($result);
        ?>
        <div style="margin-bottom: 2%">
            <?php // Html::a('Create Sales', ['create'], ['class' => 'btn btn-success',]) ?>
            <?= Html::a('Delete all sales',['truncate'],['class' => 'btn btn-danger', 
                'data'=>['confirm'=>'Are you sure you want to delete all the sales?','method'=>'post',]])?>
            <?= Html::a('Upload datas from a Excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
            <?php // Html::a('Avanced search',['search'],['class' => 'btn btn-default'])?>
        </div>
        <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                 'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],
    //            'options'=>[
    //                'style' =>'padding-top:2%'
    //            ],
                'showHeader' => true,
                'showOnEmpty' => false,
                'columns' => array_merge([['class' => 'yii\grid\SerialColumn']],$result),
            ]); 
            ?>
        <?php Pjax::end(); ?>

    </div>
<?php


