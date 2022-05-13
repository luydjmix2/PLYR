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
                <h3>{{__('myGroups.opt02')}}</h3>
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <input type="text" value="Group 1" class="col-6 form-control" id="CAMBIARNOMBRE1" name="CAMBIARNOMBRE1" placeholder="Group Name">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="CAMBIARNOMBRE2" name="CAMBIARNOMBRE2" rows="4" placeholder="Description">Empresa Tecnologica pionera en Buscadores</textarea>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <h1>Shared Records</h1>
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="d-sm-table-cell text-center">Shared</th>
                                        <th class="d-sm-table-cell text-center">First Name</th>
                                        <th class="d-sm-table-cell text-center">Last Name</th>
                                        <th class="d-sm-table-cell text-center">Position</th>
                                        <th class="d-sm-table-cell text-center">Email</th>
                                        <th class="d-sm-table-cell text-center">Mobile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="example-cb-custom-circle1" name="example-cb-custom-circle1" checked="">
                                                <label class="custom-control-label" for="example-cb-custom-circle1"></label>
                                            </div>
                                        </td>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Dalton</td>
                                        <td class="text-left">Gerente de Ventas</td>
                                        <td class="text-left">carlos@demo.com</td>
                                        <td class="text-left">758 947 2563</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="example-cb-custom-circle1" name="example-cb-custom-circle1">
                                                <label class="custom-control-label" for="example-cb-custom-circle1"></label>
                                            </div>
                                        </td>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Dalton</td>
                                        <td class="text-left">Gerente de Ventas</td>
                                        <td class="text-left">carlos@demo.com</td>
                                        <td class="text-left">758 947 2563</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="example-cb-custom-circle1" name="example-cb-custom-circle1" checked="">
                                                <label class="custom-control-label" for="example-cb-custom-circle1"></label>
                                            </div>
                                        </td>
                                        <td class="text-left">Carlos</td>
                                        <td class="text-left">Dalton</td>
                                        <td class="text-left">Gerente de Ventas</td>
                                        <td class="text-left">carlos@demo.com</td>
                                        <td class="text-left">758 947 2563</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="d-sm-table-cell text-center">Shared</th>
                                        <th class="d-sm-table-cell text-center">Name</th>
                                        <th class="d-sm-table-cell text-center">Date</th>
                                        <th class="d-sm-table-cell text-center">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="example-cb-custom-circle1" name="example-cb-custom-circle1">
                                                <label class="custom-control-label" for="example-cb-custom-circle1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">Document 1</td>
                                        <td class="text-left">25-25-2502</td>
                                        <td class="text-center">POWER OF ATTORNEY</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="example-cb-custom-circle1" name="example-cb-custom-circle1" checked="">
                                                <label class="custom-control-label" for="example-cb-custom-circle1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">Document 2</td>
                                        <td class="text-left">30-30-3205</td>
                                        <td class="text-center">POWER OF ATTORNEY</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="block-options-item">
                                    <button type="button" class="btn btn-primary btn-sm col-2">Save</button>
                                </div>
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
