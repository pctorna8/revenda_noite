@extends('principal')

@section('conteudo')

<div class='col-sm-11'>
    <h2> Graficos de Carros </h2>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Marca', 'Nº de Veiculos'],
          
          @foreach ($carros as $carro)
          {!! "['$carro->marca', $carro->num]," !!}
          
          @endforeach
        ]);

        var options = {
          title: 'N veiculos por marcas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
 
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
 

</div>


@endsection