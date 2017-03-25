<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\vmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Virtual Machines';
$this->params['breadcrumbs'][] = [
    'label'=>$this->title,
    'options'=>['class'=>'breadcrumbs'],
]
?>
<div class="vm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
    <p>
        <?php // Html::a('Insert a virtual machine', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete all data',['truncate'],['class' => 'btn btn-danger', 
            'data'=>['confirm'=>'Warning: this will delete all the recordings','method'=>'post',]])?>
        <?= Html::a('Upload data from a Excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
        <?= Html::a('Test search',['evolution'],['class' => 'btn btn-default'])?>
    </p>
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>  'vm_esx_host',
              //'value'=> 'vm_esx_host',
              'format' => 'raw',
              'value'=>function ($data) {
                         return Html::a($data->vm_esx_host,"https://www.google.fr/#q=$data->vm_esx_host",['target'=>'_blank']);
                     },
               'filter' =>yii\helpers\ArrayHelper::map(\app\models\vm::find()->groupBy('vm_esx_host')->asArray()->all(),'vm_esx_host','vm_esx_host'),
            ],
            [
                'attribute'=>'inventory_date',
                'value'=>'inventory_date',
                'format'=>'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'inventory_date',
                    'dateFormat' => 'yyyy-MM-dd'
                    ])
            ],
            //'region',
            //'vcenter_server',
            [
                'attribute'=>'vm_name',
                'value'=>'vm_name',
                'format'=>'raw',
//                'filter' => yii\helpers\ArrayHelper::map(\app\models\vm::find()->groupBy('vm_name')->asArray()->all(),'vm_name','vm_name')
                ],
                             
            'vm_host_name',
            'vm_state',
            'vm_ip',
            //'vm_family',
            // 'vm_guest_full_name',
            // 'vm_guest_id',
             'vm_memory',
            
             
             'vm_total_vcpu',
             'vm_num_cpus',
             //'vm_num_cores_per_cpu',
             //'vm_hardware_version',
             //'vm_is_template',
             //'vm_tools_status',
             //'vm_tools_version',
             //'vm_tools_version_status',
             //'vm_name_check',
             //'vm_provisionedspaceGB',
             //'vm_usedspaceGB',
             //'vm_compliance_check',
             //'VMCountryCode',

            ['class' => 'yii\grid\ActionColumn',
                                'template'=>'{view} {update} {delete}',
                                'buttons' => [
                                   'view' => function ($url,$model) {
                                           return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
                                                   'http://localhost:8080/index.php?r=vm%2Fevolution', ['title' => Yii::t('app', 'evolution'),]);},
                                            ],
            ],
        ],
    ]); ?>
    <?php   Modal::begin([
                      'id' =>'modal',
                      'header'=>'<h4>ESX detail<h4>',
                      'size'=>'modal - lg',
                      ]);
          echo  "<div id= 'modalContent'></div>";
    ?>
    <?php Modal::end();?>
    <?php Pjax::end();?>
</div>
<?php 
        $this->registerJs("$(function() {
           $('#popupModal').click(function(e) {
             e.preventDefault();
             $('#modal').modal('show').find('.modal-content')
             .load($(this).attr('href'));
           });
        });");
    ?>