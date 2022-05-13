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
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="content col-xl-10">
                                <form action="" method="POST" enctype="multipart/form-data"
                                      onsubmit="return false;"></form>
                                <div class="form-group form-row">
                                    <div class="col-6">
                                        <label for="example-text-input">First Name</label>
                                        <input type="text" class="form-control" id="CAMBIAR-NAME1" name="CAMBIAR-NAME1"
                                               placeholder="First Name">
                                    </div>
                                    <div class="col-6">
                                        <label for="example-email-input">Last Name</label>
                                        <input type="text" class="form-control" id="CAMBIAR-NAME2" name="CAMBIAR-NAME2"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-6">
                                        <label for="example-text-input">Position</label>
                                        <input type="text" class="form-control" id="CAMBIAR-NAME3" name="CAMBIAR-NAME3"
                                               placeholder="Position">
                                    </div>
                                    <div class="col-6">
                                        <label for="example-email-input">Email</label>
                                        <input type="email" class="form-control" id="CAMBIAR-NAME4" name="CAMBIAR-NAME4"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-6">
                                        <label for="example-text-input">Email</label>
                                        <input type="text" class="form-control" id="CAMBIAR-NAME3" name="CAMBIAR-NAME5"
                                               placeholder="Email">
                                    </div>
                                    <div class="col-6">
                                        <label for="example-email-input">Mobile</label>
                                        <input type="email" class="form-control" id="CAMBIAR-NAME4" name="CAMBIAR-NAME6"
                                               placeholder="Mobile">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm col-2">Add</button>
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
                                    @foreach($registers as $register)
                                        <tr>
                                            <td class="fw-semibold fs-sm">
                                                <a href="#">{{$register->first_name}}</a>
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$register->last_name}}
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$register->position}}
                                            </td>
                                            <td class="d-none d-md-table-cell fs-sm">
                                                {{$register->email}}
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                {{$register->phone}}
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
