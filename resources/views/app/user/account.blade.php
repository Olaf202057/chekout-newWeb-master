@extends('layouts.app')

@section('title')
    <title>Chekout</title>
@endsection

@section('content')
    <!-- slider -->

<section class="account_content">
    <section class="account_left">
        <ul>
            <li class="nav_selected">
                <a><span>Profile Settings</span></a>
            </li>
        </ul>
    </section>
    <section class="account_right">
        @yield('account_right_panel')
    </section>
</section>

@endsection

@push('scripts')
    <script>

    </script>
@endpush

