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
                        <a href="#" class="btn btn-sm btn-warning" title="Editar">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" title="Eliminar">
                            <i class="ace-icon fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')

@endsection
