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
                <h3>{{__('myGroups.name')}}</h3>
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <h1>My Groups</h1>
                            <div class="block-header">
                                <h3 class="block-title">Manage Groups</h3>
                                <div class="block-options">
                                    <div class="block-options-item">
                                        <a href="{{route("mygroups.add")}}" class="btn btn-primary btn-sm">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="d-sm-table-cell text-center">Group Name</th>
                                        <th class="d-sm-table-cell text-center">Date</th>
                                        <th class="d-sm-table-cell text-center">Description</th>
                                        <th class="d-sm-table-cell text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-left">Group 1</td>
                                        <td class="text-center">25-05-2050</td>
                                        <td class="text-left">POWER OF ATTORNEY</td>
                                        <td class="text-center">
                                            <div class="block-options">
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Edit Client">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Remove Client">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Group 2</td>
                                        <td class="text-center">25-05-2055</td>
                                        <td class="text-left">POWER OF ATTORNEY</td>
                                        <td class="text-center">
                                            <div class="block-options">
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Edit Client">
                                                    Edit
                                                </button>
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
