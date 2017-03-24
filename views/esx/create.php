<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esx */

$this->title = 'Create Esx';
$this->params['breadcrumbs'][] = ['label' => 'Esxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esx-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
