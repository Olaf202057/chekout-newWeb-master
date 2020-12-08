@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <!-- slider -->

    <section class="about-us-slider swiper-container p-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-item">
                <img src="{{ asset('/img/processed.jpeg') }}" class="img-fluid full-width" alt="Banner">
                <div class="transform-center">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 align-self-center">
                                <div class="right-side-content">
                                    <h1 class="text-custom-white fw-600">Crave it? Get it.</h1>
                                    <h3 class="text-custom-white fw-400">Search for a favorite restaurant, cuisine, or
                                        dish.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay overlay-bg"></div>
            </div>
        </div>
    </section>



@endsection

@push('scripts')
    <script>

    </script>
@endpush

