@extends('layouts.appLanding')

@section('breadcrumb')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('organic/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Carrito de compras</h2>
                        <div class="breadcrumb__option">
                            <a href="#">Inicio</a>
                            <span>Listado de productos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Productos</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $cart->products as $cart_product )
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset('images/products/'.$cart_product->image)}}" width="100px" height="100px"  alt="">
                                    <h5>{{ $cart_product->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    S/. {{ $cart_product->pivot->price }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" data-url="{{ route('modify.quantity') }}" data-cart="{{ $cart->id }}" data-price="{{ $cart_product->unitPrice }}" data-prod="{{ $cart_product->id }}" data-qty value="{{ $cart_product->pivot->quantity }}">
                                        </div>
                                    </div>
                                </td>
                                <td data-total="total" id="{{ $cart_product->id }}" class="shoping__cart__total">
                                    S/. {{ number_format($cart_product->pivot->price * $cart_product->pivot->quantity, 2)  }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span data-url="{{ route('delete.detail') }}" data-delete="{{ $cart_product->id }}" data-cart="{{ $cart->id }}" class="icon_close"></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('tienda.organic') }}" class="primary-btn cart-btn">CONTINUAR COMPRANDO</a>
                    <a href="{{ route('shopping.cart') }}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Actualizar carrito</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total de carrito</h5>
                    <ul>
                        <li>Subtotal <span>S/. {{ number_format($total, 2) }}</span></li>
                        <li>Delivery <span>S/. 10.00 </span></li>
                        <li>Total <span>S/. {{ number_format($total+10, 2) }}</span></li>
                    </ul>
                    <a href="{{ route('shop.checkout', $cart->id) }}" class="primary-btn">PASAR POR LA CAJA</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection

@section('scripts')
    <script src="{{ asset('js/shop/shop-cart.js') }}"></script>
@endsection
