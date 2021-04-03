@extends('layouts.admin.admin')

@section('content')
<!-- Subir documento -->
<link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/pages/dropzone.js') }}"></script>
@section('title-page')
{{ __($proyect_data[0]['proyect_name'])}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('proyect.view', $proyect_data[0]['proyect_name']) }}
@endsection 
@php
print_r($proyect_data);
print_r($user);
print_r($files);
@endphp


<!-- Hero Content -->
<div class="bg-image" style="background-image: url('{{asset("/media/photos/photo23@2x.jpg")}}');">
     <div class="bg-primary-op">
        <div class="content content-full overflow-hidden">
            <div class="my-8 text-center">
                <h1 class="text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$user[0]['company']}}</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$proyect_data[0]['proyect_description']}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->
<br><br>
<div class="row justify-content-md-center">
    <div class="col-10">
        <button type="button" class="btn btn-lg btn-primary js-tooltip-enabled form-control" data-toggle="tooltip" title="" data-original-title="Remove Client">
            <i class="fa fa-fw fa-share-square"></i>
        </button>
    </div>
</div>
<!-- Page Content -->
<div class="bg-white">
    <div class="content content-boxed">
        <div class="row">
            <div class="col-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Group Team</h3>
                        <div class="float-right col-md-1">
                            <a href="{{route('group.user.create', $proyect_data[0]['id'])}}"> <button type="button" class="mb-3 mr-1 btn btn-info">
                                    <i class="fa fa-fw fa-{{ __('bts.add-icon')}}"></i> {{ __('bts.add')}}
                                </button></a>
                        </div>
                        <div class="block-options">
                            <div class="block-options-item">
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{__('users.name_full')}}</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">{{__('users.position')}}</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">{{__('users.email')}}</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">{{__('users.movil')}}</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">{{__('users.phone')}}</th>
                                    <th class="text-center" style="width: 100px;">{{__('proyects.acctions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($team as $team_user)
                                <tr>
                                    <td class="font-w600 font-size-sm">
                                        {{$team_user['name']}}
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        {{$team_user['position']}}
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        {{$team_user['email']}}
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        {{$team_user['movil']}}
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        {{$team_user['phone']}}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-share-square"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {!! Form::open(['route'=> 'group.file', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                <div class="dz-message" style="height:200px;">
                    Drop your files here
                </div>
                <div class="dropzone-previews"></div>
                <button type="submit" class="btn btn-success" id="submit">Save</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Files</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Name</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <th class="text-center" scope="row">{{$file['id']}}</th>
                                    <td class="font-w600 font-size-sm">
                                        <a href="#">{{$file['document_name']}}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-warning">Trial</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-share-square"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection

@push('js_after')

@endpush
