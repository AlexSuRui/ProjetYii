<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\vmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Virtual Machines';
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
        <?php // Html::a('Avanced search',['search'],['class' => 'btn btn-default'])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'inventory_date',
            'region',
            'vcenter_server',
            'vm_name',
            'vm_host_name',
            'vm_state',
            'vm_ip',
            'vm_family',
             'vm_guest_full_name',
             'vm_guest_id',
             'vm_memory',
             'vm_esx_host',
             'vm_total_vcpu',
             'vm_num_cpus',
             'vm_num_cores_per_cpu',
             'vm_hardware_version',
             'vm_is_template',
             'vm_tools_status',
             'vm_tools_version',
             'vm_tools_version_status',
             'vm_name_check',
             'vm_provisionedspaceGB',
             'vm_usedspaceGB',
             'vm_compliance_check',
             'VMCountryCode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
