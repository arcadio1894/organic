@extends('layouts.appLanding')

@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('organic/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Caja</h2>
                    <div class="breadcrumb__option">
                        <a href="#">Inicio</a>
                        <span>Realizar pedido</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Tienes un cupón? <a href="#">Click Aquí</a> para ingresar tu código
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Detalles del pago</h4>
            <form action="#" id="formCheckout" data-url="{{ route('place.order') }}">
                @csrf
                <input type="hidden" name="cart" value="{{ $cart->id }}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" value="{{ $cart->customer->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Seleccione dirección<span>*</span></p>
                            @if( count($cart->customer->addresses) != 0 )
                            <select name="addresses" id="cboAddress">
                                <option value="">Seleccione una dirección</option>
                                @foreach( $cart->customer->addresses as $address )
                                <option value="{{$address->id}}">{{ $address->address }}</option>
                                @endforeach
                            </select> <br>
                            @else
                                <p><span>Ingrese una dirección para el envío</span></p>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" id="country">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" id="address" placeholder="Street Address" class="checkout__input__add">
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" id="city">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" id="postcode">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" value="{{ $cart->customer->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value="{{ $cart->customer->user->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Tu pedido</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach( $cart->products as $detail )
                                <li> {{ substr($detail->name,0,40)  }}... <span>S/. {{ number_format($detail->pivot->price * $detail->pivot->quantity, 2)  }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>S/. {{ number_format($subtotal, 2) }}</span></div>
                            <div class="checkout__order__subtotal">Delivery <span> S/. 10.00 </span></div>
                            <div class="checkout__order__total">Total <span>S/. {{ number_format($total,2) }}</span></div>
                            <button type="submit" class="site-btn">REALIZAR PEDIDO</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection

@section('scripts')
    <script src="{{ asset('js/shop/checkout.js') }}"></script>
@endsection
