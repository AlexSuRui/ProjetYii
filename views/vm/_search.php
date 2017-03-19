<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\vmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vm_name') ?>

    <?= $form->field($model, 'vm_host_name') ?>

    <?= $form->field($model, 'vm_state') ?>

    <?= $form->field($model, 'vm_ip') ?>

    <?= $form->field($model, 'vm_family') ?>

    <?php // echo $form->field($model, 'vm_guest_full_name') ?>

    <?php // echo $form->field($model, 'vm_guest_id') ?>

    <?php // echo $form->field($model, 'vm_memory') ?>

    <?php // echo $form->field($model, 'vm_esx_host') ?>

    <?php // echo $form->field($model, 'vm_total_vcpu') ?>

    <?php // echo $form->field($model, 'vm_num_cpus') ?>

    <?php // echo $form->field($model, 'vm_num_cores_per_cpu') ?>

    <?php // echo $form->field($model, 'vm_hardware_version') ?>

    <?php // echo $form->field($model, 'vm_is_template') ?>

    <?php // echo $form->field($model, 'vm_tools_status') ?>

    <?php // echo $form->field($model, 'vm_tools_version_status') ?>

    <?php // echo $form->field($model, 'vm_name_check') ?>

    <?php // echo $form->field($model, 'vm_provisionedspaceGB') ?>

    <?php // echo $form->field($model, 'vm_usedspaceGB') ?>

    <?php // echo $form->field($model, 'vm_compliance_check') ?>

    <?php // echo $form->field($model, 'VMCountryCode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
