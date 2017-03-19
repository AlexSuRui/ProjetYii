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
        ]); 
    // bugs, should accepte null.
      foreach($champs as $champ){
        if($champ == 'id'){
            echo $form->field($model,$champ);
        }else{
                echo $form->field($model, $champ)->dropDownList(
                ArrayHelper::map(sales::find()->groupBy($champ)->asArray()->all(),$champ,$champ),['text' => 'Please select', 'options' => ['value' => 'none', 'class' => 'prompt', 'label' => 'Select']]);
        }
      }
      ?>
   
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset',['class' =>'btn btn-default'])?>
    </div>

    <?php ActiveForm::end();?>

</div>

