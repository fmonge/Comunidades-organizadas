@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="/administracion" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/administracion/estados" class="current">Evidencia</a>
    </div>
  </div>
  <!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editar tipo de estados</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="/administracion/estados/update/{{ $state->id }}">
              @csrf

              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $state->name }}" required autofocus>
                  <hr />
                  @if ($errors->has('name'))
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>Error!</strong> {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                    @if ($state->active)
                      <label><input type="checkbox" name="active" checked/>Activo</label>
                    @else
                      <label><input type="checkbox" name="active"/>Activo</label>
                    @endif
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Confirmar" class="btn btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection