<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MyTable */

$this->title = 'Create My Table';
$this->params['breadcrumbs'][] = ['label' => 'My Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
