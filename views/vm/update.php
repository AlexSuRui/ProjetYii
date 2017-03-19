<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vm */

$this->title = 'Update Vm: ' . $model->vm_host_name;
$this->params['breadcrumbs'][] = ['label' => 'Vms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vm_host_name, 'url' => ['view', 'id' => $model->vm_host_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
