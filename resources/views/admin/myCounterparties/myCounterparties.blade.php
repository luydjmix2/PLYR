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
                <h3>{{__('myCounterparties.name')}}</h3>
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="text-center">Company Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Group</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">Coca Cola</td>
                                        <td class="text-left">Carlosd@cocacola.com</td>
                                        <td class="text-left">Group 1</td>
                                        <td class="text-center">
                                            <div class="block-options">
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Coca Cola</td>
                                        <td class="text-left">Carlosd@cocacola.com</td>
                                        <td class="text-left">Group 1</td>
                                        <td class="text-center">
                                            <div class="block-options">
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="block">
                                <div class="block-header">
                                    <h4>Search Company</h4>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Company Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Group</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">Coca Cola</td>
                                            <td class="text-center">Carlos@cocacola.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0" selected>Grupo 1</option>
                                                    <option value="1">Grupo 2</option>
                                                    <option value="2">Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Google</td>
                                            <td class="text-center">David@google.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Grupo 1</option>
                                                    <option value="1">Grupo 2</option>
                                                    <option value="2" selected>Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Amazon</td>
                                            <td class="text-center">Andres@amazon.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Grupo 1</option>
                                                    <option value="1" selected>Grupo 2</option>
                                                    <option value="2">Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="block">
                                <div class="block-header">
                                    <div class="block-options-item">
                                        <a href="{{route("counterparties.create")}}" class="btn btn-primary col-12">Add External Company</a>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Company Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Group</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">Coca Cola</td>
                                            <td class="text-center">Carlos@cocacola.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0" selected>Grupo 1</option>
                                                    <option value="1">Grupo 2</option>
                                                    <option value="2">Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Google</td>
                                            <td class="text-center">David@google.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Grupo 1</option>
                                                    <option value="1">Grupo 2</option>
                                                    <option value="2" selected>Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Amazon</td>
                                            <td class="text-center">Andres@amazon.com</td>
                                            <td class="text-center">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Grupo 1</option>
                                                    <option value="1" selected>Grupo 2</option>
                                                    <option value="2">Grupo 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="block-options">
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
