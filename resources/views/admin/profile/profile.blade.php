@extends('layouts.admin.admin')

@section('content')
    <!-- Subir documento -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plyr.css') }}">
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/pages/dropzone.js') }}"></script>
    <script src="{{ asset('js/plyr.js') }}"></script>
    <script src="{{ asset('js/pages/viewGroup.js') }}"></script>
@section('title-page')
    {{__('profile.name')}}
@endsection
@section('breadcrumbs')
    {{--    {{ Breadcrumbs::render('group.view', $proyect_data[0]['proyect_name']) }}--}}
@endsection
@php
    $url_background =asset("/media/photos/photo23@2x.jpg");
@endphp
<div class="row">
    <div class="col-12">
        <div class="block block-rounded">
            <div class="block-content">
                @php
                    //dd($Company);
                @endphp
                <h3>{{__('profile.opt02')}}</h3>
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="content">
                                <form class="form-row" action="/Plastillas Nuevas_08- My company sell side copy" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                                    <div class="col-6">
                                        <div class="form-group form-row">
                                            <div class="col-6">
                                                <label for="example-email-input">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                            </div>
                                            <div class="col-6">
                                                <label for="example-text-input">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-6">
                                                <label for="example-email-input">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="col-6">
                                                <label for="example-text-input">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Company Name</label>
                                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Zip Code</label>
                                                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-6">
                                                <label for="example-email-input">Password</label>
                                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="col-6">
                                                <label for="example-text-input">Repeat Pasword</label>
                                                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Paswword">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label style="visibility: hidden;"for="example-text-input">Boton de Guardar</label><br>
                                                <button type="submit" class="btn btn-primary col-2">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Bordered Table -->
                    </div>
                </div>
                <!-- END Page Container -->
            </div>
        </div>
    </div>
</div>


@endsection
@push('js_after')

@endpush
