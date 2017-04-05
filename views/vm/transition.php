<?php
    use yii\helpers\Html;
$this->title = 'Virtual Machines';
$this->params['breadcrumbs'][] = [
    'label'=>$this->title,
    'options'=>['class'=>'breadcrumbs'],
]
?>
<div class="container-fluid">
    <div class="row">
        	<div class="col-md-3">
			 <?= Html::a('<i class="fa fa-home"></i> Upload',['vm/upload'], ['class' => 'btn btn-danger', 'style' => 'margin-left:25%']) ?>
		</div>
		<div class="col-md-3">
			 <a href="#" class="btn btn-lg btn-info" type="button"><i class="fa fa-home">Button</i></a>
		</div>
		<div class="col-md-3">
			 <a href="#" class="btn btn-lg btn-info" type="button">Button</a>
		</div>
		<div class="col-md-3">
			 <a href="#" class="btn btn-lg btn-info" type="button">Button</a>
		</div>
    </div>
</div>

