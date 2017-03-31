<?php
use kartik\switchinput\SwitchInput;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/**
 * Compoment SwithchInput
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
        'action' => Url::to(['indexcustmized']),
        'method' => 'post',
        
        'fieldConfig'=>[
            'align-content:center'
        ]
    ]); 
   
    echo '<div id="div1" class="col-md-3 ">';
    //Use a loop to save the status of each swichInput
    //Afficher les columsn en divisant par 3
    for($i=0; $i< count($champs)/4; $i++){
        echo '<label class="control-label" style="align-content:center">'.$champs[$i].'</label>';
        // More options in the doc
        if($champs[$i]=='inventory_date'||$champs[$i]=='FQDN'||$champs[$i]=='connected_state'
                ||$champs[$i]=='ip_address'||$champs[$i]=='mac_address'||$champs[$i]=='cpu_speed'
                ||$champs[$i]=='cluster_name'||$champs[$i]=='dns_servers'){
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>true,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
//            Yii::warning($champs[i]);
        } else {
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>FALSE,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
        }
    }
    echo '</div>';
    echo '<div id="div2" class="col-md-3 ">';
       for($i= count($champs)/4; $i<count($champs)/4*2; $i++){
        echo '<label class="control-label" style="align-content:center">'.$champs[$i].'</label>';
        // More options in the doc
        if($champs[$i]=='inventory_date'||$champs[$i]=='FQDN'||$champs[$i]=='connected_state'
                ||$champs[$i]=='ip_address'||$champs[$i]=='mac_address'||$champs[$i]=='cpu_speed'
                ||$champs[$i]=='cluster_name'||$champs[$i]=='dns_servers'){
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>true,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
            Yii::warning($champs[i]);
        } else {
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>FALSE,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
        }
    }
    echo '</div>';
    echo '<div id="div3" class="col-md-3 ">';
       for($i= count($champs)/4*2; $i<count($champs)/4*3; $i++){
        echo '<label class="control-label" style="align-content:center">'.$champs[$i].'</label>';
        // More options in the doc
        if($champs[$i]=='inventory_date'||$champs[$i]=='FQDN'||$champs[$i]=='connected_state'
                ||$champs[$i]=='ip_address'||$champs[$i]=='mac_address'||$champs[$i]=='cpu_speed'
                ||$champs[$i]=='cluster_name'||$champs[$i]=='dns_servers'){
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>true,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
            Yii::warning($champs[i]);
        } else {
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>FALSE,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
        }
    }
    echo '</div>';
    echo '<div id="div3" class="col-md-3 ">';
       for($i= count($champs)/4*3; $i<count($champs); $i++){
        echo '<label class="control-label" style="align-content:center">'.$champs[$i].'</label>';
        // More options in the doc
        if($champs[$i]=='inventory_date'||$champs[$i]=='FQDN'||$champs[$i]=='connected_state'
                ||$champs[$i]=='ip_address'||$champs[$i]=='mac_address'||$champs[$i]=='cpu_speed'
                ||$champs[$i]=='cluster_name'||$champs[$i]=='dns_servers'){
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>true,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
            Yii::warning($champs[i]);
        } else {
            echo SwitchInput::widget([
                'inlineLabel'=>false,
                'name'=>$champs[$i], 
                'value'=>FALSE,
                'pluginOptions' => [
                    'animate' => false,
                    'size'=>'mini'
                ],
            ]); 
        }
    }
    echo '</div>';
//    past way to display the champs
//    foreach ($champs as $champ){
?>
        <div class="form-group col-md-offset-5">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset',['class' =>'btn btn-default'])?>      
        </div>
    
   <?php ActiveForm::end(); ?>

