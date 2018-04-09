@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Grafico Anual</div>
                    <div class="panel-body">                    
                        <div id="perf_div"></div>
                        <?= \Lava::render('ColumnChart', 'Finances', 'perf_div') ?>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Grafico Anual</div>
                    <div class="panel-body">     
                        <div id="sales_div"></div>
                        <?= \Lava::render('CalendarChart', 'Sales', 'sales_div') ?>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Grafico Anual</div>
                    <div class="panel-body"> 
                        <div id="chart-div"></div>
                        <?= \Lava::render('DonutChart', 'IMDB', 'chart-div') ?>
                    
                </div>              
            </div>          
@endsection
