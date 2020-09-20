@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModDepartamento')
    active open
@endsection

@section('activeListDepartamento')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard.home') }}">Inicio</a>
            </li>
            <li class="">
                <a href="{{ route('dashboard.department.index') }}">Departamentos</a>
            </li>
            <li class="active">Editar</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Departamentos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Editar departamento
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="col-md-8 col-md-offset-2">
        <form id="formEdit" class="form-horizontal" method="POST" data-url="{{ route('dashboard.department.update') }}">
            @csrf
            <input type="hidden" name="department_id" value="{{ $department->id }}">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="name"> Departamento </label>

                <div class="col-sm-9">
                    <input type="text" id="name" name="name" placeholder="Nombre" class="col-xs-10 col-sm-5" value="{{ $department->name }}" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="description"> Descripción </label>

                <div class="col-sm-9">
                    <textarea name="description" id="description" cols="30" rows="5">{{ $department->description }}</textarea>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Guardar cambios
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <a class="btn" href="{{ route('dashboard.department.index') }}">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/department/edit.js') }}"></script>
@endsection
