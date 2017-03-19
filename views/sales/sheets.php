<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Choose a sheet';
$this->params['breadcrumbs'][] = $this->title;
//$sheets=['abc','bbc','msn'];
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
        foreach ($sheets as $sheet){
            echo Html::a($sheet,['loaddata']);
            echo '<br>';
        }
    ?>

</div>
