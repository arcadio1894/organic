@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModProducto')
    active open
@endsection

@section('activeListProducto')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard.home') }}">Inicio</a>
            </li>
            <li class="">Notificación</li>
            <li class="active">Recibida</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')

@endsection

@section('scripts')
    <script>
        Echo.private('order-placed')
            .listen('OrderPlaced', (e) => {
                alert(e.mensaje);
            });
    </script>
    {{--<script src="{{ asset('js/product/index.js') }}"></script>--}}
@endsection
