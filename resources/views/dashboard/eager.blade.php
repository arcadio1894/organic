@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard.home') }}">Inicio</a>
            </li>
            <li class="active">Dashboard</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    @foreach( $products as $product )
        {{ $product->department->name }}
    @endforeach
    {{--@foreach( $products as $product )
        {{ $product->name }}
    @endforeach--}}
@endsection

@section('scripts')

@endsection
