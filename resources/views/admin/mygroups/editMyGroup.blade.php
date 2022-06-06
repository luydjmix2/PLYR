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
                        {{Form::open(['route' => ['mygroups.update', $gRecors["group"]->id], 'method' => 'post'])}}
                        <div class="block">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <input type="text" value="{{$gRecors["group"]->name}}"
                                           class="col-6 form-control" id="group_name" name="group_name"
                                           placeholder="Group Name">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                              placeholder="Description">{{$gRecors["group"]->description}}</textarea>
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
{{--                                    $gRecors["register"]--}}
                                    @foreach($registers as $key => $valReg)
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">

                                                    <input type="checkbox" class="custom-control-input" id="checked-register-group-edit-{{$valReg->id}}" name="checked-register-group-edit[{{$valReg->id}}]" value="{{$valReg->id}}" {{$valReg->check? 'checked=""': '' }}>
                                                    <label class="custom-control-label" for="checked-register-group-edit-{{$valReg->id}}"></label>
                                                </div>
                                            </td>
                                            <td class="text-left">{{$valReg->first_name}}</td>
                                            <td class="text-left">{{$valReg->last_name}}</td>
                                            <td class="text-left">{{$valReg->position}}</td>
                                            <td class="text-left">{{$valReg->email}}</td>
                                            <td class="text-left">{{$valReg->movil}}</td>
                                        </tr>
                                    @endforeach
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
                                    @foreach($documents as $valDoc)
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">

                                                    <input type="checkbox" class="custom-control-input" id="checked-document-group-edit-{{$valDoc->id}}" name="checked-document-group-edit[{{$valDoc->id}}]" value="{{$valDoc->id}}" {{$valDoc->check ? 'checked=""': '' }}>
                                                    <label class="custom-control-label" for="checked-document-group-edit-{{$valDoc->id}}"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$valDoc->document_name}}</td>
                                            <td class="text-left">{{$valDoc->created_at}}</td>
                                            <td class="text-center">{{$valDoc->description}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="block-options-item">
                                    <button type="button" class="btn btn-primary btn-sm col-2">Save</button>
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
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
