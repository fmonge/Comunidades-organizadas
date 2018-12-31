@extends('report.layouts.edit_master')

@section('page-title', 'Seguridad')

@section('page-desc', 'Editar reporte de seguridad')

@section('form', '/seguridad')

@section('tabs')
    <li class="tab">
        <a data-toggle="tab" href="#involved_tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-group fa-fw"></i></span> <span class="hidden-xs">Involucrados</span> </a>
    </li>
    
@endsection

@section('tab-content')
    <!-- Victims & Perpetrators w/ gender-->

    <div id="involved_tab" class="tab-pane">
        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Víctimas</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-victim"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="victim-item row form-group">
                </div>
                @foreach($report->securityReport->victims as $victim)

                    <div class="victim-item row form-group">
                        <div class="col-sm-1">
                            <a href="#" class="btn btn-default btn-sm remove-victim"><span class="fa fa-minus"></span></a>
                        </div>
                        <div class="col-sm-10 victim-gender">
                            <select name="victim_gender[]" class="form-control gender_select">
                                @foreach($genders as $gender)
                                    @if ($victim->gender_id == $gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Perpetradores</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-perpetrator"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="perpetrator-item row form-group">
                </div>
                @foreach($report->securityReport->perpetrators as $perpetrator)

                    <div class="perpetrator-item row form-group">
                        <div class="col-sm-1">
                            <a href="#" class="btn btn-default btn-sm remove-perpetrator"><span class="fa fa-minus"></span></a>
                        </div>
                        <div class="col-sm-5 perpetrator-gender">
                            <select name="perpetrator_gender[]" class="form-control gender_select">
                                @foreach($genders as $gender)
                                    @if ($perpetrator->gender_id == $gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5 perpetrator-description">
                            <textarea name="perpetrator_description[]" rows="2" class="form-control form-control-line" placeholder="Una breve descripción del sujeto">{{ $perpetrator->description }}</textarea>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
@endsection