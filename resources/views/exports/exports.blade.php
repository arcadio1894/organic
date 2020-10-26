@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('activeModExports')
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
                <a href="{{ route('dashboard.department.index') }}">EXPORTACIONES</a>
            </li>
            <li class="active">Realizar exportaciones</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Exportar Archivos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Vista para exportar archivos PDF
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="col-md-12">
        <a href="{{ route('export.pdf') }}" class="btn btn-xlg btn-primary"> Save HTML->PDF </a>
        <a href="{{ route('export2.pdf') }}" target="_blank" class="btn btn-xlg btn-success"> Stream HTML->PDF </a>
        <a href="{{ route('export3.pdf') }}" class="btn btn-xlg btn-warning"> Download HTML->PDF </a>
        <a href="{{ route('export4.pdf') }}" target="_blank" class="btn btn-xlg btn-default"> Stream File->PDF </a>
        <a href="{{ route('export.departments.pdf') }}" target="_blank" class="btn btn-xlg btn-purple"> Stream View->PDF </a>
    </div>
@endsection

@section('scripts')

@endsection