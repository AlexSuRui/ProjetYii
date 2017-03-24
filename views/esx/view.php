<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\esx */

$this->title = $model->inventory_date;
$this->params['breadcrumbs'][] = ['label' => 'Esxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esx-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'inventory_date' => $model->inventory_date, 'FQDN' => $model->FQDN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'inventory_date' => $model->inventory_date, 'FQDN' => $model->FQDN], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'inventory_date',
            'region',
            'vcenter_server',
            'UUID',
            'device_name',
            'FQDN',
            'connected_state',
            'device_manufacturer',
            'device_model',
            'device_serial_number',
            'operating_system',
            'operating_system_name',
            'operating_system_version',
            'operating_system_build',
            'ip_address',
            'mac_address',
            'ram',
            'cpu_name',
            'cpu_speed',
            'cpu_chip_count',
            'cpu_core_count',
            'cluster_name',
            'datacenter_name',
            'import_device_type_id',
            'esx_version_check',
            'fqdn_check',
            'domain_name_check',
            'dns_check',
            'dns_servers',
            'search_suffix_check',
            'vswitch_forged_transmits',
            'promiscious_mode',
            'mac_changes',
            'nic_teaming_active',
            'default_vm_portgroup',
            'esx_mgmt_network_check',
            'esx_nas_network_check',
            'ad_authentication',
            'ntp_check',
            'ntp_service',
            'ntp_services',
            'DCUI',
            'ESXi_Shell',
            'SSH_Status',
            'Lockdown_Mode',
            'SysLog_Status',
            'SSL_Cert',
            'SSL_Cert_Issuer',
            'NLB_check',
            'TPS_check',
            'Cut_and_Paste_check',
            'ESXiCountryCode',
        ],
    ]) ?>

</div>
