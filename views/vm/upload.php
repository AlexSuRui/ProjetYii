<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
$this->title = 'Upload a excel file';
?>
<h2><?= Html::encode($this->title) ?></h2>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    ]); 
?>
<div class="col-md-offset-5">
    <?= $form->field($model, 'file')->fileInput() ?>

    <!--<button class="btn btn-primary">Submit</button>-->
    <div class="form-group">
    <?=    Html::submitButton('Upload', [
        'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure to reload this file?',
                'method' => 'post',
            ],
    ])?>
    </div>
</div>
<?php ActiveForm::end() ?>