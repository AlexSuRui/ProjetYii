<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\esx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esx-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inventory_date')->textInput() ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vcenter_server')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UUID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FQDN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connected_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operating_system')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operating_system_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operating_system_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operating_system_build')->textInput() ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ram')->textInput() ?>

    <?= $form->field($model, 'cpu_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpu_speed')->textInput() ?>

    <?= $form->field($model, 'cpu_chip_count')->textInput() ?>

    <?= $form->field($model, 'cpu_core_count')->textInput() ?>

    <?= $form->field($model, 'cluster_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datacenter_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'import_device_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'esx_version_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fqdn_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domain_name_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dns_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dns_servers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_suffix_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vswitch_forged_transmits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promiscious_mode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac_changes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nic_teaming_active')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_vm_portgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'esx_mgmt_network_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'esx_nas_network_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ad_authentication')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ntp_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ntp_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ntp_services')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DCUI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESXi_Shell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SSH_Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lockdown_Mode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SysLog_Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SSL_Cert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SSL_Cert_Issuer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NLB_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TPS_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cut_and_Paste_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESXiCountryCode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
