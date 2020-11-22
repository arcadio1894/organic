@extends('layouts.appLanding')

@section('activeContacto')
    active
@endsection

@section('breadcrumb')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('organic/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contáctanos</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <a href="#">Contacto</a>
                            <span>Formulario de contacto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Teléfono</h4>
                        <p>+51 965858458</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Dirección</h4>
                        <p>Avenida Mansiche #456</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Horario de atención</h4>
                        <p>09:00 am to 11:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>store@organic.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
                height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Trujillo</h4>
                <ul>
                    <li>Teléfono: +51 965858458</li>
                    <li>Dirección: Av. Mansiche #456 Trujillo</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Déjanos un mensaje</h2>
                    </div>
                </div>
            </div>
            <form method="POST" id="formContact" data-url="{{ route('contact.send') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="content" placeholder="Tu mensaje"></textarea>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">ENVIAR MENSAJE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection

@section('scripts')
    <script src="{{ asset('js/shop/contact.js') }}"></script>
@endsection
