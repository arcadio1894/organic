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
            <li class="">Productos</li>
            <li class="active">Listado</li>
        </ul><!-- /.breadcrumb -->

    </div>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Productos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Mantenedor de Productos
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="col-lg-12">
        <a data-create class="btn btn-success btn-xlg ">Nuevo producto</a>
    </div>
    &nbsp; &nbsp;
    <div class="col-md-12">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Presentación</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $products as $product )
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->unitsInStock }}</td>
                    <td>{{ $product->unitPrice }}</td>
                    <td>
                        @if( $product->image == null )
                            <img src="{{ asset('images/not-found.jpg') }}" width="100px" height="100px" alt="">
                        @else
                            <img src="{{ asset('images/products/'.$product->image) }}" width="100px" height="100px" alt="">
                        @endif
                    </td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->department->name }}</td>
                    <td>
                        <a data-show="{{ $product->id }}" class="btn btn-sm btn-default" title="Ver detalles">
                            <i class="ace-icon fa fa-eye"></i>
                        </a>
                        <a data-edit="{{ $product->id }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>
                        <a data-delete="{{ $product->id }}" data-name="{{ $product->name }}" class="btn btn-sm btn-danger" title="Eliminar">
                            <i class="ace-icon fa fa-trash"></i>
                        </a>
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
                        <h4 class="modal-title">Eliminar producto</h4>
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
                        <input type="hidden" id="product_id" name="product_id">
                        <input type="text" id="product_name" readonly="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalCrear" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Crear producto</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <form id="formCreate" data-url="#">
                    @csrf
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/product/index.js') }}"></script>
@endsection
