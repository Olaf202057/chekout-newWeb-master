@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <!-- slider -->

<section class="walletedit_content">
    <div class="walletedit_panel">
        <a href="{{ route('app.user.wallet.show') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="walletedit_title">
            <span>MasterCard</span>
            <img src="{{ asset('img/mastercard.webp') }}" class="img-fluid" alt="card">
        </div>
        <h6>**** 7760</h6>
        <h5>Details</h5>
        <h3>Expiry Date</h3>
        <p>04/2022</p>
        <h3>Country</h3>
        <p>United States</p>
        <h5>Actions</h5>
        <div class="walletcard_edit">
            <i class="fas fa-pen"></i>
            <span>Edit</span>
        </div>
        <div class="walletcard_remove">
            <i class="fas fa-minus-circle"></i>
            <span>Remove payment method</span>
        </div>
    </div>

</section>

@endsection

@push('scripts')

    <script>

        $(document).ready(function() {

        });


    </script>
@endpush

