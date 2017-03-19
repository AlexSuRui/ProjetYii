<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\vm */

$this->title = 'Create Vm';
$this->params['breadcrumbs'][] = ['label' => 'Vms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
