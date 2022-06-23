@extends('layouts.admin.admin')

@section('content')
    <!-- Subir documento -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plyr.css') }}">
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/pages/dropzoneLogo.js') }}"></script>
    <script src="{{ asset('js/plyr.js') }}"></script>
    <script src="{{ asset('js/pages/viewGroup.js') }}"></script>
@section('title-page')
    {{__('company.name')}}
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
                <h3>{{PLYRH::UserData()->company->company_name}} {{__('company.name')}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        @if(is_array(session('success')))
                            <ul>
                                @foreach (session('success') as $succes)
                                    <li>{{ $succes }}</li>
                                @endforeach
                            </ul>
                        @else
                            {{ session('success') }}
                        @endif
                    </div>
                @endif
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="content">
                                    {!! Form::open(['route'=> ['company.update', $user->company->id], 'method' => 'POST', 'files'=>'true', 'id' => 'upload-form-company' , 'class' => 'form-row']) !!}
                                    <div class="col-6">
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Company Name</label>
                                                <input type="text" class="form-control" id="company_name"
                                                       name="company_name" value="{{$user->company->company_name? $user->company->company_name :@old('company_name')}}"
                                                       placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-6">
                                                <label for="example-email-input">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                       value="{{$user->company->company_email? $user->company->company_email :@old('email')}}" placeholder="Email">
                                            </div>
                                            <div class="col-6">
                                                <label for="example-text-input">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_number"
                                                       name="phone_number" value="{{$user->company->company_number? $user->company->company_number :@old('phone_number')}}"
                                                       placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Address 1</label>
                                                <input type="text" class="form-control" id="address_1" name="address_1"
                                                       value="{{$user->company->company_address? $user->company->company_address :@old('address_1')}}"
                                                       placeholder="Address 1">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Address 2</label>
                                                <input type="text" class="form-control" id="address_2" name="address_2"
                                                       value="{{$user->company->company_address_two? $user->company->company_address_two :@old('address_2')}}"
                                                       placeholder="Address 2">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Zip Code</label>
                                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                       value="{{$user->company->company_code? $user->company->company_code :@old('zip_code')}}" placeholder="Zip Code">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                       value="{{$user->company->company_country? $user->company->company_country :@old('country')}}"
                                                       placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-6">
                                                <label for="example-text-input">State</label>
                                                <input type="text" class="form-control" id="state" name="state"
                                                       value="{{$user->company->company_state? $user->company->company_state :@old('state')}}" placeholder="State">
                                            </div>
                                            <div class="col-6">
                                                <label for="example-email-input">City</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                       value="{{$user->company->company_city? $user->company->company_city :@old('city')}}" placeholder="City">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">WebSite</label>
                                                <input type="text" class="form-control" id="website" name="website"
                                                       value="{{$user->company->company_web? $user->company->company_web :@old('website')}}" placeholder="WebSite">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                @if($user->company->company_url_logo)
                                                <img src="{{Storage::url($user->company->company_url_logo)}}" style="width: 84%;padding: 8px;margin: 0px auto;display: block;">
                                                <br>
                                                @endif
                                                <label for="example-text-input">Logo</label>
                                                <input type="file" class="form-control" id="logo" name="logo">
                                            </div>
                                        </div>
{{--                                        <div class="dropzone" id="upload-form-logo-company" data-action="{{route('company.update.logo', $user->company->id)}}" >--}}
{{--                                            <div class="dz-default dz-message">--}}
{{--                                                Logo--}}
{{--                                                <br>--}}
{{--                                                My Company--}}
{{--                                            </div>--}}
{{--                                            <div class="dropzone-previews"></div>--}}
{{--                                        </div>--}}

                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Password</label>
                                                <input type="text" class="form-control" id="password" name="password"
                                                       placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col-12">
                                                <label for="example-text-input">Repeat Password</label>
                                                <input type="text" class="form-control" id="confirm_password"
                                                       name="confirm_password" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm col-2">Save</button>
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
