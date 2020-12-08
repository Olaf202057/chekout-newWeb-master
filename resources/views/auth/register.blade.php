@extends('layouts.auth')

@section('auth-section')
    <div class="login-sec">
        <div class="login-box">
            <form action="{{ route('auth.register.store') }}" method="POST">
                @csrf
                <h4 class="text-light-black fw-600">Create your account</h4>
                <div class="row">
                    @if($errors->any())
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light-white fs-14">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-submit"
                                   placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light-white fs-14">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-submit"
                                   placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label class="text-light-white fs-14">Email</label>
                            <input type="email" name="email" class="form-control form-control-submit"
                                   placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label class="text-light-white fs-14">Password (8 character minimum)</label>
                            <input type="password" id="password-field" name="password"
                                   class="form-control form-control-submit"
                                   placeholder="Password" required>
                            <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                        </div>
                        <div class="form-group">
                            <label class="text-light-white fs-14">Password Repeat</label>
                            <input type="password" id="password-field" name="password_confirmation"
                                   class="form-control form-control-submit"
                                   placeholder="Password" required>
                        </div>
                        <div class="form-group checkbox-reset">
                            <label class="custom-checkbox mb-0">
                                <input type="checkbox" name="#"> <span class="checkmark"></span> Keep me signed
                                in</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-second btn-submit full-width"><i class="fas fa-user"></i>
                                &nbsp; Create your account
                            </button>
                        </div>
                        <div class="form-group text-center"><span>or</span>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <button type="submit" class="btn-second btn-facebook full-width">--}}
                        {{--                                <img src="assets/img/facebook-logo.svg" alt="btn logo">Continue with Facebook</button>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <button type="submit" class="btn-second btn-google full-width">--}}
                        {{--                                <img src="assets/img/google-logo.png" alt="btn logo">Continue with Google</button>--}}
                        {{--                        </div>--}}
                        <div class="form-group text-center">
                            <p class="text-light-black mb-0">Have an account? <a href="{{ route('auth.login') }}">Sign
                                    in</a>
                            </p>
                        </div>
                        <span
                            class="text-light-black fs-12 terms">By creating your foodmart account, you agree to the <a
                                href="#"> Terms of Use </a> and <a href="#"> Privacy Policy.</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#phone").inputmask({
                mask: '999-999-9999',
                placeholder: '888-888-8888',
                removeMaskOnSubmit: true
            })
        });
    </script>
@endpush
