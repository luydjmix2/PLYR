@extends('layouts.portal.portal')

@section('content')
@section('title-page')
    {{ __('Register')}}
@endsection
<!-- Page Content -->
<div class="hero-static loginbackground">
    <div class="content loginPLR">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-sm-12 col-xl-6 col-xs-12">
                <!-- Sign In Block -->
                <div class="block block-rounded block-themed mb-0">
                    <div class="block-header bg-primary-dark d-none">
                        <h3 class="block-title">Sign In</h3>
                        <div class="block-options">
                            <a class="btn-block-option font-size-sm" href="op_auth_reminder.html">Forgot Password?</a>
                            <a class="btn-block-option" href="op_auth_signup.html" data-toggle="tooltip" data-placement="left" title="New Account">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row fila">
                            <div class="col-md-5 columna30r">
                                <img src="/img/logologin.png" width="100%">
                                <img src="/img/welcomelogin.png" width="60%">
                            </div>
                            <div class="col-md-7 columna70r">
                                <h1 class="h2 mb-1 center">SIGN UP</h1>
                                <p class="text-muted">
                                    Please fill all the form fields to sign up.
                                </p>
                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group regfg">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group regfg">
                                        <input id="company" type="text" placeholder="{{ __('Company Name') }}" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>
                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group regfg">
                                        <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group regfg">
                                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group regfg">
                                        <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group row justify-content-center mb-0">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-primary registerbtn"><i class="fa fa-fw fa-plus mr-1"></i> {{ __('Register') }}</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Sign In Block -->
            </div>
        </div>
    </div>
    <div class="content content-full font-size-sm text-muted text-center copyright">
        <strong>PL&R</strong> &copy; <span data-toggle="year-copy"></span>
    </div>
</div><!-- END Page Content -->
@endsection
