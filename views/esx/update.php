<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esx */

$this->title = 'Update Esx: ' . $model->inventory_date;
$this->params['breadcrumbs'][] = ['label' => 'Esxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_date, 'url' => ['view', 'inventory_date' => $model->inventory_date, 'FQDN' => $model->FQDN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esx-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
