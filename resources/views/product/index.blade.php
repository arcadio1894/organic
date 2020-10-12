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
                        <a data-show="{{ $product->id }}" data-url="{{ route('dashboard.product.get', $product->id) }}" class="btn btn-sm btn-default" title="Ver detalles">
                            <i class="ace-icon fa fa-eye"></i>
                        </a>
                        <a data-edit="{{ $product->id }}" data-url="{{ route('dashboard.product.get', $product->id) }}" class="btn btn-sm btn-warning" title="Editar">
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
                <form id="formDelete" class="form-horizontal" data-url="{{ route('dashboard.product.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <h4>¿Está seguro de eliminar el producto?</h4>
                        <input type="hidden" id="product_idD" name="product_id">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" id="product_name" class="col-xs-10 col-sm-10" readonly="">
                            </div>
                        </div>

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
                <form id="formCreate" class="form-horizontal" data-url="{{ route('dashboard.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Producto </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" placeholder="Producto" class="col-xs-10 col-sm-10" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionShort"> Descripción corta </label>

                            <div class="col-sm-9">
                                <textarea name="descriptionShort" id="descriptionShort" cols="30" rows="4" class="col-xs-10 col-sm-10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionLarge"> Descripción larga </label>

                            <div class="col-sm-9">
                                <textarea name="descriptionLarge" id="descriptionLarge" cols="30" rows="4" class="col-xs-10 col-sm-10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitsInStock"> Unidades en Stock </label>

                            <div class="col-sm-9">
                                <input type="number" min="0" class="col-xs-10 col-sm-10" name="unitsInStock" id="unitsInStock">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitPrice"> Precio Unitario </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="unitPrice" id="unitPrice">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitPrice"> Imagen (540x560) </label>

                            <div class="col-sm-9">
                                <input type="file" accept="image/jpeg,image/png" name="image" id="image" class="col-xs-10 col-sm-10">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="stars"> Calificación </label>

                            <div class="col-sm-9">
                                <input type="number" class="col-xs-10 col-sm-10" min="0" max="5" name="stars" id="stars" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="weight"> Presentación </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="weight" id="weight" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="department_id"> Departamento </label>

                            <div class="col-sm-9">
                                <select name="department_id" id="department_id" class="col-xs-10 col-sm-10">
                                    @foreach( $departments as $department )
                                        <option value="{{ $department->id }}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalEditar" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Editar producto</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <form id="formEdit" class="form-horizontal" data-url="{{ route('dashboard.product.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" id="product_idE">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="nameE"> Producto </label>

                            <div class="col-sm-9">
                                <input type="text" id="nameE" name="name" placeholder="Producto" class="col-xs-10 col-sm-10" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionShortE"> Descripción corta </label>

                            <div class="col-sm-9">
                                <textarea name="descriptionShort" id="descriptionShortE" cols="30" rows="4" class="col-xs-10 col-sm-10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionLargeE"> Descripción larga </label>

                            <div class="col-sm-9">
                                <textarea name="descriptionLarge" id="descriptionLargeE" cols="30" rows="4" class="col-xs-10 col-sm-10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitsInStockE"> Unidades en Stock </label>

                            <div class="col-sm-9">
                                <input type="number" min="0" class="col-xs-10 col-sm-10" name="unitsInStock" id="unitsInStockE">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitPriceE"> Precio Unitario </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="unitPrice" id="unitPriceE">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="imageE"> Imagen (540x560) </label>

                            <div class="col-sm-9">
                                <input type="file" accept="image/jpeg,image/png" name="image" id="imageE" class="col-xs-10 col-sm-10">
                                <img src="" id="url_image" alt="" width="150px" height="150px">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="starsE"> Calificación </label>

                            <div class="col-sm-9">
                                <input type="number" class="col-xs-10 col-sm-10" min="0" max="5" name="stars" id="starsE" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="weightE"> Presentación </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="weight" id="weightE" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="department_idE"> Departamento </label>

                            <div class="col-sm-9">
                                <select name="department_id" id="department_idE" class="col-xs-10 col-sm-10">
                                    @foreach( $departments as $department )
                                        <option value="{{ $department->id }}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalVer" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Información del producto producto</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <form action="#" class="form-horizontal">
                    <div class="modal-body" id="bodyShow">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="nameS"> Producto </label>

                            <div class="col-sm-9">
                                <input type="text" id="nameS" name="name" placeholder="Producto" class="col-xs-10 col-sm-10" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionShortS"> Descripción corta </label>

                            <div class="col-sm-9">
                                <p id="descriptionShortS" class="col-xs-10 col-sm-10"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="descriptionLargeS"> Descripción larga </label>

                            <div class="col-sm-9">
                                <p id="descriptionLargeS" class="col-xs-10 col-sm-10"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitsInStockS"> Unidades en Stock </label>

                            <div class="col-sm-9">
                                <input type="number" min="0" class="col-xs-10 col-sm-10" name="unitsInStock" id="unitsInStockS" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="unitPriceS"> Precio Unitario </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="unitPrice" id="unitPriceS" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="imageS"> Imagen (540x560) </label>

                            <div class="col-sm-9">
                                <img src="" id="url_image" alt="" width="200px" height="200px">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="starsS"> Calificación </label>

                            <div class="col-sm-9">
                                <input type="number" class="col-xs-10 col-sm-10" min="0" max="5" name="stars" id="starsS" value="0" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="weightS"> Presentación </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="weight" id="weightS" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="departmentS"> Departamento </label>

                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-10" name="weight" id="departmentS" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/product/index.js') }}"></script>
@endsection
