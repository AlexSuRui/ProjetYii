<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\vm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\salesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Virtual Machines';
$this->params['breadcrumbs'][] = [
    'label'=>$this->title,
    'options'=>['class'=>'breadcrumbs'],
]
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
                    //      $v = isset($_POST[$champ])?$_POST[$champ] : false;
                            $v = isset($_POST[$champ])?true : false;
                        if($champ=='vm_esx_host'){
                            continue;
                            }else{
                                array_push($result, ['attribute'=>$champ, 'visible'=>$v]);
                            }  
                        }   
                       $cookies =  Yii::$app->response->cookies;
                       $cookies -> add(new \yii\web\Cookie([
                           'name'=>'result',
                           'value' => $result,
                       ]));
                    }

        
                Yii::info($result);
        ?>
        <div style="margin-bottom: 2%">
            <?php // Html::a('Create Sales', ['create'], ['class' => 'btn btn-success',]) ?>
            <?= Html::a('Delete all sales',['truncate'],['class' => 'btn btn-danger', 
                'data'=>['confirm'=>'Are you sure you want to delete all the sales?','method'=>'post',]])?>
            <?= Html::a('Upload datas from a Excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
            <?php Html::a('Test',['evolution'],['class' => 'btn btn-default'])?>
        </div>

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
                'columns' => array_merge(
                                array_merge([['class' => 'yii\grid\SerialColumn']],
                                    array_merge([['attribute'=>  'vm_esx_host','format' => 'raw','value'=>function ($data) {
                                                                    return Html::a($data->vm_esx_host,['site/index']);
                                                                    },
                                                        ]],$result)),
                                                        [['class' => 'yii\grid\ActionColumn',
                                                            'template'=>'{view} {update} {delete}',
                                                            'buttons' => [
                                                               'view' => function ($url,$model) {   
                                                                       return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
                                                                       $url);},
                                                                        ],
                                                        ],])
                                            ]); 
        ?>

    </div>
<?php


