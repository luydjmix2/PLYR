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
{{ __($proyect_data[0]['proyect_name'])}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('group.view', $proyect_data[0]['proyect_name']) }}
@endsection 
<!-- Hero Content -->
<div class="bg-image" style="background-image: url('{{asset("/media/photos/photo23@2x.jpg")}}');">
     <div class="bg-primary-op">
        <div class="content content-full overflow-hidden">
            <div class="my-8 text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="{{ asset($compamy[0]['company_url_logo']) }}" alt="">
                </div>
                <h1 class="text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$user[0]['company']}}</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$proyect_data[0]['proyect_description']}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->
<div class="bg-white">
    <div class="content content-boxed">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <button type="button" class="btn btn-lg btn-primary js-tooltip-enabled form-control" data-toggle="tooltip" title="" data-original-title="Remove Client">
                    <i class="fa fa-fw fa-share-square"></i>
                </button>
            </div>
        </div>
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
                        @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
                        <div class="float-right col-md-1">
                            <a href="{{route('group.user.create', $proyect_data[0]['id'])}}"> <button type="button" class="mb-3 mr-1 btn btn-info">
                                    <i class="fa fa-fw fa-{{ __('bts.add-icon')}}"></i> {{ __('bts.add')}}
                                </button></a>
                        </div>
                        @endif
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
                                    @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
                                    <th class="text-center" style="width: 100px;">{{__('proyects.acctions')}}</th>
                                    @endif
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
                                    @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary tooltip-bts" data-toggel="0" data-action="toltips-alert-acctions-user-{{$proyect_data[0]['id']}}">{{__('bts.actions')}}</button>
                                        <br>
                                        <div class="tooltip-bts-alerts-hidden tooltip-bts-alerts" id="toltips-alert-acctions-user-{{$proyect_data[0]['id']}}">
                                            <a href="{{route('group.user.edit', ['id_group' => $proyect_data[0]['id'], 'id' => $team_user['id']])}}" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </a>
                                            <br>
                                            <a href="{{route('group.user.remove', ['id_group'=>$proyect_data[0]['id'], 'id_user'=>$team_user['id']])}}" class="btn btn-sm btn-light js-tooltip-enabled users-delete" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                            @if($listGroups)
                                            <br>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled push bt-modal-share" data-toggle="modal" data-target="#modal-block-popin" data-user="{{$team_user['id']}}">
                                                <i class="fa fa-fw fa-share-square"></i>
                                            </button>
                                            @endif
                                            <!--                                            <a href="{{route('group.user.share', $team_user['id'])}}" class="btn btn-sm btn-light js-tooltip-enabled push" data-toggle="modal" title="" data-target="#modal-block-popin" data-original-title="shared Client">
                                                                                            <i class="fa fa-fw fa-share-square"></i>
                                                                                        </a>-->
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
        <div class="row">
            <div class="col-12">
                {!! Form::open(['route'=> 'group.file', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                <div class="dz-message" style="height:200px;">
                    Drop your files here
                    <br>
                    Maximum weight per file is 20 MG
                    <br>
                    10 files at a time per upload
                    <br>
                    Only allows documents (word, excel and pdf) and images
                </div>
                <div class="dropzone-previews"></div>
                {{Form::hidden('id_group', $proyect_data[0]['id'])}}
                {!! Form::close() !!}

            </div>
        </div>
        @endif
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
                                    @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $keyFile => $file)
                                <tr>
                                    <th class="text-center" scope="row">{{$keyFile+1}}</th>
                                    <td class="font-w600 font-size-sm">
                                        <a href="{{url($file['document_url'])}}" target="_blanck">{{$file['document_name']}}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-warning">Trial</span>
                                    </td>
                                    @if(Helper::validUserPropertyGroup(Auth::id(), $proyect_data[0]['proyect_name']))
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary tooltip-bts" data-toggel="0" data-action="toltips-alert-acctions-{{$file['id']}}">{{__('bts.actions')}}</button>
                                        <br>
                                        <div class="tooltip-bts-alerts-hidden tooltip-bts-alerts" id="toltips-alert-acctions-{{$file['id']}}">
                                            <a href="{{route('group.file.delite', $file['id'])}}" class="btn btn-sm btn-light js-tooltip-enabled document-destroy" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                            <br>
                                            <a href="{{url($file['document_url'])}}" target="_black" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="download file" download>                                                <i class="fa fa-fw fa-download"></i>
                                            </a>
                                            @if($listGroups)
                                            <br>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled push bt-modal-file-share" data-toggle="modal" data-target="#modal-block-file-group" data-file="{{$file['id']}}">
                                                <i class="fa fa-fw fa-share-square"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                    @endif
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

@component('components.modal.formSharedUserGroup')    

@slot('title')
Share user in another group
@endslot
<div class="block-content">
    {{Form::hidden('user_id_share', $proyect_data[0]['id'],['id'=>'user_id_share'])}}
    {{Form::hidden('company_id_share', $compamy[0]['id'],['id'=>'company_id_share'])}}
    <div class="form-group">
        {{ Form::label('group', 'Select group to share', ['class' => 'control-label']) }}
        {{ Form::select('group', $listGroups, null, ['class' => 'form-control']) }}
    </div>
</div>
@endcomponent

@component('components.modal.formSharedFileGroup')    

@slot('title')
Share user in another group
@endslot
<div class="block-content">
    {{Form::hidden('file_id_share', $proyect_data[0]['id'],['id'=>'file_id_share'])}}
    {{Form::hidden('company_id_share', $compamy[0]['id'],['id'=>'company_id_share'])}}
    <div class="form-group">
        {{ Form::label('group', 'Select group to share', ['class' => 'control-label']) }}
        {{ Form::select('group', $listGroups, null, ['class' => 'form-control']) }}
    </div>
</div>
@endcomponent


@endsection
@push('js_after')

@endpush