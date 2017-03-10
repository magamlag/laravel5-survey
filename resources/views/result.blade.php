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
                <div class="col-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Result</div>
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
        </div>
    </div>
@endsection