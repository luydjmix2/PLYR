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
                                    <form class="form-row" action="{{route("profile.update", $userCom->user->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-6">
                                            <div class="form-group form-row">
                                                <div class="col-6">
                                                    <label for="example-email-input">First Name</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="first_name"
                                                           value="{{old("first_name")? old("first_name"):$userCom->user->first_name}}"
                                                           placeholder="First Name">
                                                </div>
                                                <div class="col-6">
                                                    <label for="example-text-input">Last Name</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="last_name"
                                                           value="{{old("last_name")? old("last_name"):$userCom->user->last_name}}"
                                                           placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-6">
                                                    <label for="example-email-input">Email</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                           value="{{old("email")? old("email"):$userCom->user->email}}"
                                                           placeholder="Email">
                                                </div>
                                                <div class="col-6">
                                                    <label for="example-text-input">Phone Number</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="phone_number"
                                                           name="phone_number"
                                                           value="{{old("phone_number")? old("phone_number"):$userCom->user->phone_number}}"
                                                           placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-12">
                                                    <label for="example-text-input">Address</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                           value="{{old("address")? old("address"):$userCom->user->address}}"
                                                           placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-12">
                                                    <label for="example-text-input">Zip Code</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="zip_code"
                                                           name="zip_code"
                                                           value="{{old("zip_code")? old("zip_code"):$userCom->user->zip_code}}"
                                                           placeholder="Zip Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-row">
                                                <div class="col-12">
                                                    <label for="example-text-input">City</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                           value="{{old("city")? old("city"):$userCom->user->city}}"
                                                           placeholder="City">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-12">
                                                    <label for="example-text-input">State</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="state" name="state"
                                                           value="{{old("state")? old("state"):$userCom->user->state}}"
                                                           placeholder="State">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-12">
                                                    <label for="example-text-input">Country</label><span
                                                        class="text-danger"> *</span>
                                                    <input type="text" class="form-control" id="country" name="country"
                                                           value="{{old("country")? old("country"):$userCom->user->country}}"
                                                           placeholder="Country">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-6">
                                                    <label for="example-email-input">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password" placeholder="Password">
                                                </div>
                                                <div class="col-6">
                                                    <label for="example-text-input">Repeat Pasword</label>
                                                    <input type="password" class="form-control" id="confirm_password"
                                                           name="confirm_password" placeholder="Confirm Paswword">
                                                </div>
                                            </div>
                                            <div class="form-group form-row">
                                                <div class="col-4">
                                                    <label style="visibility: hidden;" for="example-text-input">Boton de
                                                        Guardar</label><br>
                                                    <button type="submit" class="btn btn-primary col-6">Save</button>
                                                </div>
                                                <div class="col-8"><br><br>
                                                    <p>Fields marked with (<span class="text-danger">*</span>) means are
                                                        required</p>
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
