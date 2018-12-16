@extends('layouts.master')

@section('content')

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 9.8896299, lng: -84.2203189},
          zoom: 8
        });
        google.maps.event.addListener(map, 'click', function (event) {
            document.getElementById("exampleInputLatitud").value = event.latLng.lat();
            document.getElementById("exampleInputLongitud").value = event.latLng.lng();
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPYKB-N0arXC7NY0HKivs9_hdOHnDXiA&callback=initMap"
    async defer>
    </script>


 <div id="page-wrapper">

            @include ('layouts.errors')
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Agregar incidente</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="active">Agregar incidente</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <div id="map" style="width: 100%; height: 480px"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="/incident" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-12">Tipo de incidente</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="type" required>
                                          @foreach ($types as $type)
                                            <option value="{{$type->name}}">{{$type->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="date">Fecha</label>
                                    <div class="col-md-12">
                                        <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$date}}" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="time">Hora</label>
                                    <div class="col-md-12">
                                        <input id="time" type="time" placeholder="" class="form-control form-control-line" name="time" value="{{$time}}" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="location">Ubicación</label>
                                    <div class="col-md-12">
                                        <input id="location" type="text" placeholder="" class="form-control form-control-line" name="location" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="exampleInputLongitud">Longitud</label>
                                    <div class="col-md-12">
                                        <input id="exampleInputLongitud" type="decimal" placeholder="" class="form-control form-control-line" name="longitud" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="exampleInputLatitud">Latitud</label>
                                    <div class="col-md-12">
                                        <input id="exampleInputLatitud" type="decimal" placeholder="" class="form-control form-control-line" name="latitud" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="exampleInputPerpetrators">Numero de perpetradores</label>
                                    <div class="col-md-12">
                                        <input id="exampleInputPerpetrators"type="number" placeholder="" class="form-control form-control-line" name="perpetrators" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="exampleInputVictims">Numero de Víctimas</label>
                                    <div class="col-md-12">
                                        <input id="exampleInputVictims"type="number" placeholder="" class="form-control form-control-line" name="victims" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Género de la victima (principal)</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="sex" required>
                                          <option value="No Aplica" selected="selected">No Aplica</option>
                                          <option value="Masculino">Masculino</option>
                                          <option value="Femenino">Femenino</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tipo de Arma (Si aplica)</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="weapon" required>
                                          @foreach ($weapons as $weapon)
                                            @if ($weapon->name == 'No Aplica')
                                              <option value="{{$weapon->name}}" selected="selected">{{$weapon->name}}</option>
                                            @else
                                                <option value="{{$weapon->name}}">{{$weapon->name}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Medio de Transporte</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="transportation" required>
                                          @foreach ($transportation as $t)
                                            @if ($t == 'Sin vehiculo')
                                              <option value="{{$t->name}}" selected="selected">{{$t->name}}</option>
                                            @else
                                                <option value="{{$t->name}}">{{$t->name}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="exampleInputDescription">Descripción</label>
                                    <div class="col-md-12">
                                        <textarea id="exampleInputDescription" rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos, especificación del medio de transporte (placa, modelo/marca de carro), pertenencias perdidas, entre otros detalles pertinentes al incidente."required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-2 col-form-label" for="exampleInputImage">Evidencia</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="file">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Agregar incidente</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer> 
        </div>

@endsection