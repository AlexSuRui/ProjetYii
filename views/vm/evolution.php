<?php
    use miloschuman\highcharts\Highcharts;
    use yii\web\JsExpression;
    
?>

<div class="col-md-5 col-md-offset-3" style="margin-top: 10%">
    <?php 
        Yii::warning($dates);
        Yii::warning($memories);
        echo Highcharts::widget([
            'options'=>[
                'title'=>['text'=>$vmName],
                'xAxis'=>[
                    'categories' =>$dates,
                ],
                'yAxis'=>[
                    'labels'=>[
                      'format'=>'{value}',  
                    ],
                    'title'=>['text'=>'memories'],
                ],
                'series' => [
                    [
                        'type' => 'spline',
                        'name'=>'memories',
                        'data'=>$memories,
                        'marker' => [
                            'lineWidth' => 2,
                            'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                            'fillColor' => 'white',
                        ],
                    ]
                ]
            ]
        ]);
    ?>
</div>

