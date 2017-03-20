<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\vm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vm-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>", 
//            'labelOptions' => ['class' => 'col-lg-2 control-label'], 
        ],
    ]); ?>
    <div id="divContent"class="col-md-12">
         <div id="div1" class="col-md-5">
        <?= $form->field($model, 'vm_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_host_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_state')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_ip')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_family')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_guest_full_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_guest_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_memory')->textInput() ?>

        <?= $form->field($model, 'vm_esx_host')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_total_vcpu')->textInput() ?>

        <?= $form->field($model, 'vm_num_cpus')->textInput() ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
        <?= $form->field($model, 'vm_num_cores_per_cpu')->textInput() ?>

        <?= $form->field($model, 'vm_hardware_version')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_is_template')->textInput() ?>

        <?= $form->field($model, 'vm_tools_status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_tools_version_status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_name_check')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'vm_provisionedspaceGB')->textInput() ?>

        <?= $form->field($model, 'vm_usedspaceGB')->textInput() ?>

        <?= $form->field($model, 'vm_compliance_check')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'VMCountryCode')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group col-md-offset-5">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
