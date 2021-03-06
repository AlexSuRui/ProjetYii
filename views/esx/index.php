<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\esxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esxes';
$this->params['breadcrumbs'][] = [
    'label'=>$this->title,
    'options'=>['class'=>'breadcrumbs'],
]
?>
<div class="esx-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Delete all data',['truncate'],['class' => 'btn btn-danger', 
            'data'=>['confirm'=>'Warning: this will delete all the recordings','method'=>'post',]])?>
        <?= Html::a('Create Esx', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('update data from excel file', ['upload'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Custmoize your search',['customize'],['class' => 'btn btn-warning'])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            // 'region',
//            'vcenter_server',
//            'UUID',
            [
              'attribute'=>  'device_name',

              'format' => 'raw',
              'value'=>function ($data) {
                         return Html::a($data->device_name,"http://mri.systems.uk.hsbc/inventory/FindServer.asp?SrchStr=$data->device_name",['target'=>'_blank']);
                     },
               'filter' =>yii\helpers\ArrayHelper::map(\app\models\vm::find()->groupBy('device_name')->asArray()->all(),'device_name','device_name'),
            ],
             'FQDN',
             'connected_state',
            // 'device_manufacturer',
            // 'device_model',
            // 'device_serial_number',
            // 'operating_system',
            // 'operating_system_name',
            // 'operating_system_version',
            // 'operating_system_build',
             'ip_address',
             'mac_address',
            // 'ram',
            // 'cpu_name',
             'cpu_speed',
            // 'cpu_chip_count',
            // 'cpu_core_count',
             'cluster_name',
            // 'datacenter_name',
            // 'import_device_type_id',
            // 'esx_version_check',
            // 'fqdn_check',
            // 'domain_name_check',
            // 'dns_check',
             'dns_servers',
            // 'search_suffix_check',
            // 'vswitch_forged_transmits',
            // 'promiscious_mode',
            // 'mac_changes',
            // 'nic_teaming_active',
            // 'default_vm_portgroup',
            // 'esx_mgmt_network_check',
            // 'esx_nas_network_check',
            // 'ad_authentication',
            // 'ntp_check',
            // 'ntp_service',
            // 'ntp_services',
            // 'DCUI',
            // 'ESXi_Shell',
            // 'SSH_Status',
            // 'Lockdown_Mode',
            // 'SysLog_Status',
            // 'SSL_Cert',
            // 'SSL_Cert_Issuer',
            // 'NLB_check',
            // 'TPS_check',
            // 'Cut_and_Paste_check',
            // 'ESXiCountryCode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
