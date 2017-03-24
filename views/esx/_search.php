<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\esxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esx-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'inventory_date') ?>

    <?= $form->field($model, 'region') ?>

    <?= $form->field($model, 'vcenter_server') ?>

    <?= $form->field($model, 'UUID') ?>

    <?= $form->field($model, 'device_name') ?>

    <?php // echo $form->field($model, 'FQDN') ?>

    <?php // echo $form->field($model, 'connected_state') ?>

    <?php // echo $form->field($model, 'device_manufacturer') ?>

    <?php // echo $form->field($model, 'device_model') ?>

    <?php // echo $form->field($model, 'device_serial_number') ?>

    <?php // echo $form->field($model, 'operating_system') ?>

    <?php // echo $form->field($model, 'operating_system_name') ?>

    <?php // echo $form->field($model, 'operating_system_version') ?>

    <?php // echo $form->field($model, 'operating_system_build') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <?php // echo $form->field($model, 'mac_address') ?>

    <?php // echo $form->field($model, 'ram') ?>

    <?php // echo $form->field($model, 'cpu_name') ?>

    <?php // echo $form->field($model, 'cpu_speed') ?>

    <?php // echo $form->field($model, 'cpu_chip_count') ?>

    <?php // echo $form->field($model, 'cpu_core_count') ?>

    <?php // echo $form->field($model, 'cluster_name') ?>

    <?php // echo $form->field($model, 'datacenter_name') ?>

    <?php // echo $form->field($model, 'import_device_type_id') ?>

    <?php // echo $form->field($model, 'esx_version_check') ?>

    <?php // echo $form->field($model, 'fqdn_check') ?>

    <?php // echo $form->field($model, 'domain_name_check') ?>

    <?php // echo $form->field($model, 'dns_check') ?>

    <?php // echo $form->field($model, 'dns_servers') ?>

    <?php // echo $form->field($model, 'search_suffix_check') ?>

    <?php // echo $form->field($model, 'vswitch_forged_transmits') ?>

    <?php // echo $form->field($model, 'promiscious_mode') ?>

    <?php // echo $form->field($model, 'mac_changes') ?>

    <?php // echo $form->field($model, 'nic_teaming_active') ?>

    <?php // echo $form->field($model, 'default_vm_portgroup') ?>

    <?php // echo $form->field($model, 'esx_mgmt_network_check') ?>

    <?php // echo $form->field($model, 'esx_nas_network_check') ?>

    <?php // echo $form->field($model, 'ad_authentication') ?>

    <?php // echo $form->field($model, 'ntp_check') ?>

    <?php // echo $form->field($model, 'ntp_service') ?>

    <?php // echo $form->field($model, 'ntp_services') ?>

    <?php // echo $form->field($model, 'DCUI') ?>

    <?php // echo $form->field($model, 'ESXi_Shell') ?>

    <?php // echo $form->field($model, 'SSH_Status') ?>

    <?php // echo $form->field($model, 'Lockdown_Mode') ?>

    <?php // echo $form->field($model, 'SysLog_Status') ?>

    <?php // echo $form->field($model, 'SSL_Cert') ?>

    <?php // echo $form->field($model, 'SSL_Cert_Issuer') ?>

    <?php // echo $form->field($model, 'NLB_check') ?>

    <?php // echo $form->field($model, 'TPS_check') ?>

    <?php // echo $form->field($model, 'Cut_and_Paste_check') ?>

    <?php // echo $form->field($model, 'ESXiCountryCode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
