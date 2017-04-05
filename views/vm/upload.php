<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
$this->title = 'Upload a excel file';
?>


<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    ]); 
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1><?= Html::encode($this->title) ?></h1>
            <br>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Alert!</h4> 
                <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
            </div>
            <h4>
                <?= $form->field($model, 'file')->fileInput() ?>
            </h4>
            <div class="form-group ">
                <?=    Html::submitButton('Upload', [
                        'class' => 'btn btn-primary',
                        'data' => [
                        'confirm' => 'Are you sure to reload this file?',
                        'method' => 'post',
                        ],
                ])?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>