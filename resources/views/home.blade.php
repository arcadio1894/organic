@extends('layouts.appLanding')

@section('breadcrumb')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('organic/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bienvenido</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <a href="#">Bienvenido</a>
                            <span>A tu cuenta personal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<!-- Categories Section Begin -->

<div class="col-lg-12">
    <div class="section-title">
        <h2>Departamentos</h2>
    </div>
    <div class="categories__slider owl-carousel">
        @foreach( $departments as $department )
            <div class="col-lg-3">
                <div class="categories__item set-bg" data-setbg="{{ asset('images/departments/'.$department->image) }}">
                    <h5><a href="#">{{ $department->name }}</a></h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Categories Section End -->
@endsection
