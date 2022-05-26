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
                <h3>{{__('myCounterparties.opt01')}}</h3>
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="content col-xl-10">
                                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return false;"></form>
                                <div class="form-group form-row">
                                    <div class="col-12">
                                        <label for="example-text-input">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-6">
                                        <label for="example-email-input">Company</label>
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                                    </div>
                                    <div class="col-6">
                                        <label for="example-text-input">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm col-2">Save</button>
                                </form>
                            </div>
                            <div class="block-content col-xl-10">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th class=" d-sm-table-cell text-center">Name</th>
                                        <th class=" d-sm-table-cell text-center">Company</th>
                                        <th class=" d-sm-table-cell text-center">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Colanta</td>
                                        <td class="text-left">CarlosD@company.com</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Colanta</td>
                                        <td class="text-left">CarlosD@company.com</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Colanta</td>
                                        <td class="text-left">CarlosD@company.com</td>
                                    </tr>
                                    </tbody>
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
