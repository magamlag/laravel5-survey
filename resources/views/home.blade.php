@extends('layouts.app')

@section('head')
    @if(Auth::user()->status != 0)
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Answer', 'Counts'],
                @foreach($answers as $item)
                    ['{{$item->text}}', {{$item->count}}],
                @endforeach
            ]);



            var options = {
                title: '',
                slices: {
                    0: {color: '#F44336'},
                    1: {color: '#F44336'},
                    2: {color: '#F44336'},
                    3: {color: '#F44336'},
                    4: {color: '#3F51B5'},
                    5: {color: '#3F51B5'},
                    6: {color: '#3F51B5'},
                    7: {color: '#3F51B5'},
                    8: {color: '#4CAF50'},
                    9: {color: '#4CAF50'},
                    10: {color: '#4CAF50'},
                    11: {color: '#4CAF50'},
                },
                pieSliceText: 'label',
                legend: 'none'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if(Auth::user()->status != 0)
            <div class="col-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Результаты опроса</div>
                        <div class="panel-body">
                            <span>
                                <div style="background: #F44336; border-radius: 10px; width:20px; height: 20px; display: inline-block"></div>
                                {{ $question[0]['text'] }}
                            </span>
                            <span>
                                <div style="background: #3F51B5; border-radius: 10px; width:20px; height: 20px; display: inline-block"></div>
                                {{ $question[1]['text'] }}
                            </span>
                            <span>
                                <div style="background: #4CAF50; border-radius: 10px; width:20px; height: 20px; display: inline-block"></div>
                                {{ $question[2]['text'] }}
                            </span>
                            <div id="piechart" class="col-12" style="height: 700px"></div>
                        </div>
                    </div>
            </div>
        @else
            <div class="col-md-8 col-md-offset-2">
                {{ Form::open(['route'=>'add', 'method'=>'post']) }}
                @foreach($questions as $item)
                    <oprosnik>
                <div class="panel panel-default">
                        <div class="panel-heading">{{ $item['title'] }}</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <p><label for="cb{{ $item['a0id'] }}"><input id="cb{{ $item['a0id'] }}" name="cg{{ $item['id'] }}" value="{{ $item['a0id'] }}" type="radio"><span style="margin-left: 15px">{{ $item['a0'] }}</span></label></p>
                                <p><label for="cb{{ $item['a1id'] }}"><input id="cb{{ $item['a1id'] }}" name="cg{{ $item['id'] }}" value="{{ $item['a1id'] }}" type="radio"><span style="margin-left: 15px">{{ $item['a1'] }}</span></label></p>
                                <p><label for="cb{{ $item['a2id'] }}"><input id="cb{{ $item['a2id'] }}" name="cg{{ $item['id'] }}" value="{{ $item['a2id'] }}" type="radio"><span style="margin-left: 15px">{{ $item['a2'] }}</span></label></p>
                                <p><label for="cb{{ $item['a3id'] }}"><input id="cb{{ $item['a3id'] }}" name="cg{{ $item['id'] }}" value="{{ $item['a3id'] }}" type="radio"><span style="margin-left: 15px">{{ $item['a3'] }}</span></label></p>
                            </div>
                        </div>
                </div>
                    </oprosnik>
                @endforeach
                {{ Form::submit('Отправить', ['class'=>'btn btn-success btn-block']) }}
                {{ Form::close() }}
            </div>
        @endif
    </div>
</div>
@endsection
