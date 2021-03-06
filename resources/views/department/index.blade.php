@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModDepartamento')
    active open
@endsection

@section('activeListDepartmento')
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
            <li class="active">Listado</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Departamentos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Mantenedor de Departamentos
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
                        <a href="#" class="btn btn-sm btn-primary" title="Ver productos">
                            <i class="ace-icon fa fa-bookmark"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-default" title="Ver detalles">
                            <i class="ace-icon fa fa-eye"></i>
                        </a>
                        @can('modificar_departamento')
                        <a href="{{ route('dashboard.department.edit', $department->id) }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>
                        @endcan
                        @can('eliminar_departamento')
                        <a data-delete="{{ $department->id }}" data-name="{{ $department->name }}" class="btn btn-sm btn-danger" title="Eliminar">
                            <i class="ace-icon fa fa-trash"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="modalEliminar" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Eliminar departamento</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <form id="formDelete" data-url="{{ route('dashboard.department.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <h4>¿Está seguro de eliminar el departamento?</h4>
                        <input type="hidden" id="department_id" name="department_id">
                        <input type="text" id="department_name" readonly="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/department/index.js') }}"></script>
@endsection
