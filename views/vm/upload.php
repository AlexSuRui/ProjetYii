<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
$this->title = 'Upload a excel file';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    ]); 
?>
<div class="alert alert-info">
    <h4>
    <?= $form->field($model, 'file')->fileInput() ?>
    </h4>
    <!--<button class="btn btn-primary">Submit</button>-->
    
</div>
<div class="form-group ">
    <?=    Html::submitButton('Upload', [
        'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure to reload this file?',
                'method' => 'post',
            ],
    ])?>
    </div>
<?php ActiveForm::end() ?>