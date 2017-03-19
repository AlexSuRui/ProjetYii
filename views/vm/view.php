<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\vm */

$this->title = $model->vm_host_name;
$this->params['breadcrumbs'][] = ['label' => 'Vms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vm_host_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vm_host_name], [
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
            'vm_tools_version_status',
            'vm_name_check',
            'vm_provisionedspaceGB',
            'vm_usedspaceGB',
            'vm_compliance_check',
            'VMCountryCode',
        ],
    ]) ?>

</div>
