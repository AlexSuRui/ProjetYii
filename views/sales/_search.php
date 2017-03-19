<?php

use app\models\sales;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\salesSearch */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Customized research';
?>

<div class="sales-search">

    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'year')->dropDownList(
        ArrayHelper::map(sales::find()->groupBy('year')->asArray()->all(),'year','year'),['prompt'=>'']
            )?>

    <?= $form->field($model, 'quarter')->dropDownList(
        ArrayHelper::map(sales::find()->groupBy('quarter')->asArray()->all(),'quarter','quarter'),['prompt'=>'']
            ) ?>

    <?= $form->field($model, 'country')->dropDownList(
        ArrayHelper::map(sales::find()->groupBy('country')->asArray()->all(),'country','country'),['prompt'=>'']    
            ) ?>

    <?= $form->field($model, 'sales') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset',['class' =>'btn btn-default'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
