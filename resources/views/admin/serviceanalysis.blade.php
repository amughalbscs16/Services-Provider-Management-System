@extends('layouts.master')
@section('bodytitle')
Analyze Services
@endsection
@section('content')
<center>
<div align="center" id="piechart" style="width: 900px; height: 500px;"></div><div id="chart_div" style="width: 900px; height: 500px;"></div>
</center>

@endsection
@section('excessjs')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);

     function drawChart() {

       var data = google.visualization.arrayToDataTable([
         ['Service', 'Providers'],
       @foreach($services as $service)
         ['{{$service->name}}',  {{$service->count}}],
       @endforeach
       ]);
       var options = {
         title: 'Services Analysis Pie Chart',

       };

       var chart = new google.visualization.PieChart(document.getElementById('piechart'));

       chart.draw(data, options);
     }
   </script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Service Name',  'Value'],
          @foreach($services as $service)
            ['{{$service->name.'-'.$service->specification}}',  {{$service->count}}],
          @endforeach
          ]);

        var options = {
          title: 'Service Analysis Area Chart',
          vAxis: {title: 'Number of Providers'},
          isStacked: true
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>



@endsection
