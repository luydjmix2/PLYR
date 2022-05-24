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
    {{--    {{ trans($proyect_data[0]['proyect_name'])}}--}}
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
                <h3>{{__('register.t1')}}</h3>
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
                            <div class="content col-xl-10">
                                <form action="{{route("dashboard.register.update", $register->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-row">
                                        <div class="col-6">
                                            <label for="example-text-input">First Name</label>
                                            <input type="text" class="form-control" id="First_Name"
                                                   name="First_Name"
                                                   placeholder="First Name" value="{{$register->first_name}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="example-email-input">Last Name</label>
                                            <input type="text" class="form-control" id="Last_Name"
                                                   name="Last_Name"
                                                   placeholder="Last Name" value="{{$register->last_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <div class="col-6">
                                            <label for="example-text-input">Position</label>
                                            <input type="text" class="form-control" id="Position"
                                                   name="Position"
                                                   placeholder="Position" value="{{$register->position}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="example-email-input">Email</label>
                                            <input type="email" class="form-control" id="Email"
                                                   name="Email"
                                                   placeholder="Email" value="{{$register->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <div class="col-6">
                                            <label for="example-text-input">Email Bloomberg</label>
                                            <input type="email" class="form-control" id="Email_Bloomberg"
                                                   name="Email_Bloomberg"
                                                   placeholder="Email" value="{{$register->bloomberg_email}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="example-email-input">Mobile</label>
                                            <input type="number" class="form-control" id="Mobile"
                                                   name="Mobile"
                                                   placeholder="Mobile" value="{{$register->movil}}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm col-2">Save</button>
                                </form>
                            </div>
                            <div class="block-content col-xl-10">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th class=" d-sm-table-cell text-center">First Name</th>
                                        <th class=" d-sm-table-cell text-center">Last Name</th>
                                        <th class=" d-sm-table-cell text-center">Position</th>
                                        <th class=" d-sm-table-cell text-center">E-mail</th>
                                        <th class=" d-sm-table-cell text-center">Mobile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($registers as $registerList)
                                        <tr>
                                            <td class="fw-semibold fs-sm">
                                                <a href="#">{{$registerList->first_name}}</a>
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$registerList->last_name}}
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$registerList->position}}
                                            </td>
                                            <td class="d-none d-md-table-cell fs-sm">
                                                {{$registerList->email}}
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                {{$registerList->phone}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
