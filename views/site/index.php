<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Server Inventory</h1>
                <p class="lead">Important Announcement.</p>
                <br>
                <br>
            </div>
            
            <div class="carousel slide" id="carousel">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel"></li>
                    <li data-slide-to="1" data-target="#carousel" class="active"></li>
                    <li data-slide-to="2" data-target="#carousel"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/people-q-c-1600-500-1.jpg"/>
                        <div class="carousel-caption">
                            <h4>Rugby HSBC</h4>
                            <a href="" id="carousel-text"><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </a>
                        </div>
                    </div>
                    <div class="item active">
                        <img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/people-q-c-1600-500-2.jpg"/>
			<div class="carousel-caption">
                            <h4> HSBC forum</h4>
                            <a href="" id="carousel-text"><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </a>
			</div>
                    </div>
                    <div class="item">
                        <img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/people-q-c-1600-500-3.jpg"/>
                        <div class="carousel-caption">
                            <h4>Data center HSBC</h4>
                            <a href="" id="carousel-text"><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </a>
                        </div>  
                    </div>
                    <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    
        <?=\yii\helpers\Html::a('Log in to know more', ['/site/login'], ['class'=>'btn btn-lg btn-success','style'=>'margin-top:2%'])?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
