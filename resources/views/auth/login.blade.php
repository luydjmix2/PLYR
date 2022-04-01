@extends('layouts.portal.portal')

@section('content')
@section('title-page')
    {{ __('login')}}
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
                            <div class="col-md-5 columna30">
                                <img src="/img/logologin.png" width="100%">
                                <img src="/img/welcomelogin.png" width="60%">
                            </div>
                            <div class="col-md-7 columna70">
                                <h1 class="h2 mb-1 center">SIGN IN</h1>
                                <p class="text-muted">
                                    Welcome, please sign in.
                                </p>

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <!--                                    <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="login-username" placeholder="Username">-->
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="asd@asd.asd" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <!--<input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Password">-->
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="123456789" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-md-flex align-items-md-center justify-content-md-between">
                                                <div class="custom-control custom-switch">
                                                    <!--<input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
                                                    <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>-->
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                                <div class="py-2">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center mb-0">
                                        <div class="col-md-6 col-xl-5">
                                            <!--<button type="submit" class="btn btn-block btn-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                            </button>-->
                                            <button type="submit" class="btn btn-block btn-primary loginbtn">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{ __('Login') }}
                                            </button>
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
</div>
<!-- END Page Content -->
@endsection
