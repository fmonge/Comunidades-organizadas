@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Numero de delitos por tipos</h2>
                        <form class="form-horizontal form-material" action="/statistics/bar" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <a>  Fecha de inicio:</a> 
                          <input id="first_date" type="date" placeholder="" class="form-control form-control-line" name="first_date" value="2013-10-10">
                          <a> Fecha de Final:</a>
                          <input id="final_date" type="date" placeholder="" class="form-control form-control-line" name="final_date" value="{{$date}}"><br>
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <button class="btn btn-success">Actualizar</button>
                              </div>
                          </div>
                        </form>
                        @foreach ($count_per_type as $count_type)
                        {{$count_type[0]}}
                        @endforeach
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        // Use Morris.Bar
                        Morris.Bar({
                          element: 'graph',
                          data: [
                          
                            {x: 'Actividad sospechosa', num: 9},
                            {x: 'Asalto', num: 1},
                            {x: 'Drogas', num: 2},
                            {x: 'Homicidio', num: 4},
                            {x: 'Robo a vehiculo', num: 5},
                            {x: 'Robo a casa', num: 3},
                            {x: 'Robo a comercio', num: 4},
                            {x: 'Vandalismo', num: 7},
                            {x: 'Otros', num: 3}
                         
                          ],
                          xkey: 'x',
                          ykeys: ['num'],
                          labels: ['Num'],
                          barColors: function (row, series, type) {
                            if (type === 'bar') {
                              var red = Math.ceil(255 * row.y / this.ymax);
                              return 'rgb(' + red + ',0,0)';
                            }
                            else {
                              return '#000';
                            }
                          }
                        });
                        </pre>
                        
                      
                    </div>
                    </div>
                </div>
@endsection