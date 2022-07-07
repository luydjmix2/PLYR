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
    @section('css_before')
        {{--    {{ trans($proyect_data[0]['proyect_name'])}}--}}
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
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
                                    <h4>Companies Shared with Me</h4>
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
                                        @foreach($counterparts as $counterpart)
                                            <tr>
                                                <td class="text-center">{{$counterpart->usercompamy->company->company_name}}</td>
                                                <td class="text-left">{{$counterpart->usercompamy->company->company_email}}</td>
                                                <td class="text-left">{{$counterpart->groupbyregisteranddocument->group->name}}</td>
                                                <td class="text-center">
                                                    <div class="block-options">
                                                        <a href="{{route('counterparties.destroy', $counterpart->id)}}"
                                                           class="btn btn-primary"
                                                           data-bs-toggle="tooltip" title=""
                                                           data-bs-original-title="Delete"
                                                           onclick="return confirm('Are you sure?')">
                                                            Delete <i class="fa fa-fw fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="block">
                                    <div class="block-content block-content-full">
                                        <h4>Existing Companies</h4>
                                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                        <table
                                            class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Group</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($companiesInternal as $itemCompa)
                                                <tr>
                                                    <form type="post" action="{{route('counterparties.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="company_id"
                                                               value="{{$itemCompa->id}}">
                                                        <td class="text-center">{{$itemCompa->company_name}}</td>
                                                        <td class="text-center">{{$itemCompa->company_email}}</td>
                                                        <td class="text-center">
                                                            <select class="form-control" id="group" name="group">
                                                                @foreach($groups as $itemGroup)
                                                                    <option
                                                                        value="{{$itemGroup->id}}">{{$itemGroup->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="block-options">
                                                                <button type="submit" class="btn btn-primary"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Add"
                                                                        onclick="return confirm('Are you sure?')">
                                                                    Add <i class="fa fa-fw fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="block">
                                    <div class="block-content block-content-full">
                                        <h4>External Companies</h4>
                                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                        <table
                                            class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Group</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($companiesExternal as $itemCompaExter)
                                                <tr>
                                                    <form type="post" action="{{route('counterparties.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="company_id"
                                                               value="{{$itemCompaExter->id}}">
                                                        <td class="text-center">{{$itemCompaExter->company_name}}</td>
                                                        <td class="text-center">{{$itemCompaExter->company_email}}</td>
                                                        <td class="text-center">
                                                            <select class="form-control" id="group" name="group">
                                                                @foreach($groups as $itemGroup)
                                                                    <option
                                                                        value="{{$itemGroup->id}}">{{$itemGroup->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="block-options">
                                                                <button type="submit" class="btn btn-primary"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Add"
                                                                        onclick="return confirm('Are you sure?')">
                                                                    Add <i class="fa fa-fw fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <a href="{{route("counterparties.create")}}" class="btn btn-primary col-3">Add External Company</a>
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
@section('js_after')
    {{--    {{ trans($proyect_data[0]['proyect_name'])}}--}}
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
@push('js_after')

@endpush
