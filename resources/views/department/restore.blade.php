@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModDepartamento')
    active open
@endsection

@section('activeRestoreDepartamento')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard.home') }}">Inicio</a>
            </li>
            <li class="">Departamentos</li>
            <li class="active">Restaurar</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Departamentos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Restaurar Departamentos
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $departments as $department )
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        @if( $department->image == null )
                            <img src="{{ asset('images/not-found.jpg') }}" width="100px" height="100px" alt="">
                        @else
                            <img src="{{ asset('images/departments/'.$department->image) }}" width="100px" height="100px" alt="">
                        @endif
                    </td>
                    <td>
                        @can('restaurar_departamento')
                        <a data-restore="{{ $department->id }}" data-name="{{ $department->name }}" class="btn btn-sm btn-success" title="Restaurar departamento">
                            <i class="ace-icon fa fa-trash"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="modalRestaurar" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Restaurar departamento</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <form id="formRestore" data-url="{{ route('dashboard.department.restore') }}">
                    @csrf
                    <div class="modal-body">
                        <h4>¿Está seguro de restaurar el departamento?</h4>
                        <input type="hidden" id="department_id" name="department_id">
                        <input type="text" id="department_name" readonly="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Restaurar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/department/restore.js') }}"></script>
@endsection
