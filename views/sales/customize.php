<?php
use kartik\switchinput\SwitchInput;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
/**
 * @author krajee <http://krajee.com/>
 * Documentation: http://demos.krajee.com/widget-details/switchinput
 */
$this->title = 'Choose the columns as you want';
?>
    <h2><?= Html::encode($this->title) ?></h2>
    
<div class="choice-form">
    
    <!--if use php manual, you need add this hidden input to make it work-->
    <!--<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />-->
<?php  
    $form = ActiveForm::begin([
        'action' => ['indexcustmized'],
        'method' => 'post',
    ]); 
    //Use a loop to save the status of each swichInput
    foreach ($champs as $champ){
        echo '<label class="control-label">'.$champ.'</label>';
        // More options in the doc
        echo SwitchInput::widget([
        'name'=>$champ, 'value'=>true,
        'pluginOptions' => [
        'animate' => false
        ]
    ]); 
    }?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset',['class' =>'btn btn-default'])?>      
    </div>
   <?php ActiveForm::end(); ?>

