@extends('layouts.base')

@section('body')
    <div class="inner-wrapper">
        <div class="container-fluid no-padding">
            <div class="row no-gutters overflow-auto">
                <div class="col-md-6">
                    <div class="main-banner">
                        <img src="{{ asset('img/auth-banner-1.jpg') }}" class="img-fluid full-width main-img"
                             alt="banner">
                        <div class="overlay-2 main-padding">
                            <img src="{{ asset('img/logo-signin.png') }}" class="img-fluid" alt="logo">
                        </div>
{{--                        <img src="https://via.placeholder.com/340x220" class="footer-img" alt="footer-img">--}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-2 user-page main-padding">
                        @yield('auth-section')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
