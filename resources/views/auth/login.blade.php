@extends('layouts.auth')

@section('auth-section')
    <div class="login-sec">
        <div class="login-box">
            <form action="{{route('auth.login.check')}}" method="POST" id="form">
                @csrf
                <h4 class="text-light-black fw-600">Sign in to Chekout</h4>
                <div class="row">
                    <div class="col-12">
                        @if(session()->has('message'))
                            <div class="alert alert-{{ session()->has('type') ? session('type') : 'danger' }}">
                                <ul>
                                    <li>{{ session('message') }}</li>
                                </ul>
                            </div>
                        @endif
                        {{--                        <p class="text-light-black">Have a corporate username? <a--}}
                        {{--                                href="add-restaurant.html">Click here</a>--}}
                        {{--                        </p>--}}
                        <div class="form-group">
                            <label class="text-light-white fs-14">Email</label>
                            <input type="email" name="email" class="form-control form-control-submit"
                                   placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label class="text-light-white fs-14">Password</label>
                            <input type="password" id="password-field" name="password"
                                   class="form-control form-control-submit" value=""
                                   placeholder="Password" required>
                            <div data-name="#password-field"
                                 class="fa fa-fw fa-eye field-icon toggle-password"></div>
                        </div>
                        <div class="form-group checkbox-reset">
                            <label class="custom-checkbox mb-0">
                                <input type="checkbox" name="#"> <span class="checkmark"></span>
                                Keep me signed in</label> <a href="#">Reset password</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-second btn-submit full-width">
                                Sign in <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div>
                        <div class="form-group text-center"><span>or</span>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <button type="submit" class="btn-second btn-facebook full-width">--}}
                        {{--                                <img src="assets/img/facebook-logo.svg" alt="btn logo">Continue with--}}
                        {{--                                Facebook--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <button type="submit" class="btn-second btn-google full-width">--}}
                        {{--                                <img src="assets/img/google-logo.png" alt="btn logo">Continue with--}}
                        {{--                                Google--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        <div class="form-group text-center mb-0"><a class="btn btn-block btn-outline-dark" href="{{ route('auth.register') }}">Create your
                                account</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
