@extends('layouts.portal.portal')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
        <div class="w-100">
            <!-- Sign Up Section -->
            <div class="bg-white">
                <div class="content content-full">
                    <div class="row justify-content-center">
                        <div class="py-4 col-md-8 col-lg-6 col-xl-4">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="mb-2">
                                    <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                </p>
                                <h1 class="mb-1 h4">
                                    Create Account
                                </h1>
                                <h2 class="mb-3 h6 font-w400 text-muted">
                                    Get your access today in one easy step
                                </h2>
                            </div>
                            <!-- END Header -->

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- <form class="js-validation-signup" action="be_pages_auth_all.html" method="POST"> --}}
                                <div class="py-3">
                                    <div class="form-group">
                                        {{-- <input type="text" class="form-control form-control-lg form-control-alt"
                                        id="signup-username" name="signup-username" placeholder="Username"> --}}

                                        <input id="signup-username " type="text"
                                            class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            placeholder="Name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="email" class="form-control form-control-lg form-control-alt"
                                        id="signup-email" name="signup-email" placeholder="Email"> --}}

                                        <input id="signup-email" type="email"
                                            class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="password" class="form-control form-control-lg form-control-alt"
                                        id="signup-password" name="signup-password" placeholder="Password"> --}}
                                        <input id="signup-password" type="password"
                                            class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="password" class="form-control form-control-lg form-control-alt"
                                        id="signup-password-confirm" name="signup-password-confirm"
                                        placeholder="Confirm Password"> --}}

                                        <input id="signup-password-confirm" type="password"
                                            class="form-control form-control-lg form-control-alt"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-md-flex align-items-md-center justify-content-md-between">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signup-terms"
                                                    name="signup-terms">
                                                <label class="custom-control-label font-w400" for="signup-terms">I agree to
                                                    Terms &amp; Conditions</label>
                                            </div>
                                            <div class="py-2">
                                                <a class="font-size-sm font-w500" href="javascript:void(0)"
                                                    data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 form-group row justify-content-center">
                                    <div class="col-md-6 col-xl-5">
                                        {{-- <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button> --}}
                                        <button type="submit" class="btn btn-block btn-success">
                                            <i class="mr-1 fa fa-fw fa-plus"></i> {{ __('Register') }}
                                        </button>


                                    </div>
                                </div>
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sign Up Section -->

            <!-- Footer -->
            <div class="py-3 text-center font-size-sm text-muted">
                <strong>OneUI 4.8</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
            <!-- END Footer -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
