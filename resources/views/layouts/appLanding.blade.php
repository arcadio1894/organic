<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('organic/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('organic/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('toast/jquery.toast.min.css') }}">
    @yield('styles')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Navegacion Responsive -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('organic/img/logo.png') }}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="{{ route('shopping.cart') }}"><i class="fa fa-shopping-basket"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{ asset('organic/img/language.png') }}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
            <a href="{{ route('register') }}"><i class="fa fa-user"></i> Registro</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="@yield('activeInicio')"><a href="{{ url('/') }}">Inicio</a></li>
            {{--<li><a href="{{ route('tienda.categories') }}">Departamentos</a></li>--}}
            <li class="@yield('activeTienda')"><a href="{{ route('tienda.organic') }}">Tienda</a></li>
            @auth()
                <li class="@yield('activePedidos')"><a href="#">Pedidos</a></li>
            @endguest
            <li class="@yield('activeContacto')"><a href="{{ route('contact') }}">Contacto</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> info@organic.com</li>
            <li>Envío gratis para todos los pedidos de $99</li>
        </ul>
    </div>
</div>
<!-- Navegacion Responsive -->

<!-- Header Section UP Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> info@organic.com</li>
                            <li>Envío gratis para todos los pedidos de $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        @guest
                            <div class="header__top__right__auth">
                                <a href="{{ route('register') }}"><i class="fa fa-plus"></i> Registro</a>
                            </div>
                            &nbsp;
                            &nbsp;
                            <div class="header__top__right__auth">
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                {{ Auth::user()->name }}
                            </div>
                            &nbsp;
                            &nbsp;
                            <div class="header__top__right__auth">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            &nbsp;
                            <div class="header__top__right__auth">
                                @can('ingresar_dashboard')
                                    <a href="{{ route('dashboard.home') }}">
                                        Dashboard
                                    </a>
                                @endcan
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('organic/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="@yield('activeInicio')"><a href="{{ url('/') }}">Inicio</a></li>
                        {{--<li><a href="{{ route('tienda.categories') }}">Departamentos</a></li>--}}
                        <li class="@yield('activeTienda')"><a href="{{ route('tienda.organic') }}">Tienda</a></li>
                        @auth()
                            <li class="@yield('activePedidos')"><a href="#">Pedidos</a></li>
                        @endauth
                        <li class="@yield('activeContacto')"><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                @auth()
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ route('shopping.cart') }}"><i class="fa fa-shopping-basket"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                @endauth
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Header Section BOTTOM Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Los departamentos</span>
                    </div>
                    <ul>
                        @foreach( $departments as $department )
                            <li><a href="#">{{ $department->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Los departamentos
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">BUSCAR</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+51 968547854</h5>
                            <span>Soporte 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
@yield('breadcrumb')

<!-- Breadcrumb Section End -->
<div id="app">
    @yield('content')
</div>

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <!-- Start Content Begin -->

            <!-- Start Content End -->
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('organic/img/logo.png') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{ asset('organic/img/payment-item.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->

<script src="{{ asset('organic/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('organic/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('organic/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('organic/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('organic/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('organic/js/mixitup.min.js') }}"></script>
<script src="{{ asset('organic/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('organic/js/main.js') }}"></script>
@yield('scripts')

</body>

</html>