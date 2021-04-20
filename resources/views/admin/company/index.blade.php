@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ __('company.name')}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('company.index', Auth::user()->company) }}
@endsection
<!-- Hero -->
<div class="bg-image" style="background-image: url('<?php echo asset('media/photos/photo8@2x.jpg'); ?>');">
    <div class="bg-black-75">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="{{ asset('media/avatars/avatar13.jpg') }}" alt="">
            </div>
            <h1 class="h2 text-white mb-0">Edit {{ __('company.name')}}</h1>
            <h2 class="h4 font-w400 text-white-75">
                {{$company[0]['company_name']}}
            </h2>
            <a class="btn btn-light" href="{{ route('dashboard') }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Go to {{__('dashboard.name')}}
            </a>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <!-- User Profile -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">{{__('company.form_title')}}</h3>
        </div>
        <div class="block-content">
            {!! Form::open(['route' => ['company.update', $company[0]['id']], 'method' => 'POST', 'files' => true]) !!}
            <!--<form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">-->
            <div class="row push">
                <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                        Your vital account information. Your name will be visible to other users, the contact information..
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    <div class="form-group">
                        {{ Form::label('company_name', __('company.company_name'), ['class' => 'control-label']) }}
                        {{ Form::text('company_name', $company[0]['company_name'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_bio', __('company.company_bio'), ['class' => 'control-label']) }}
                        {{ Form::text('company_bio', $company[0]['company_bio'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_address', __('company.company_address'), ['class' => 'control-label']) }}
                        {{ Form::text('company_address', $company[0]['company_address'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_phone', __('company.company_phone'), ['class' => 'control-label']) }}
                        {{ Form::text('company_phone', $company[0]['company_phone'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_web', __('company.company_web'), ['class' => 'control-label']) }}
                        {{ Form::text('company_web', $company[0]['company_web'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_url_logo', __('company.company_url_logo'), ['class' => 'control-label']) }}
                        <div class="push">
                            @empty(!$company[0]['company_url_logo'])
                            <img class="img-avatar" src="{{ asset($company[0]['company_url_logo']) }}" alt="">
                            @endempty
                        </div>
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            {{ Form::file('company_logo', array_merge(['class' => 'custom-file-input', 'id'=>'one-profile-edit-avatar', 'data-toggle'=>'custom-file-input', 'value'=>asset($company[0]['company_url_logo'])])) }}
                            {{ Form::label('one-profile-edit-avatar', __('company.company_web'), ['class' => 'custom-file-label']) }}
                            {{ Form::hidden('company_url_logo', $company[0]['company_url_logo'],array_merge(['class' => 'form-control'])) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('company_code', __('company.company_code'), ['class' => 'control-label']) }}
                        {{ Form::text('company_code', $company[0]['company_code'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_nid', __('company.company_nid'), ['class' => 'control-label']) }}
                        {{ Form::text('company_nid', $company[0]['company_nid'], array_merge(['class' => 'form-control'])) }}
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            {{ Form::label('company_politics', __('company.company_politics'), ['class' => 'control-label']) }}
                        </div>
                        <div class="col-3">
                            {{ Form::select('company_politics',['yes'=>'Yes', 'no'=>'No'], $company[0]['company_politics'], array_merge(['class' => 'form-control'])) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-primary">
                            Update
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- END User Profile -->
</div>
<!-- END Page Content -->

@endsection

@push('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script>
@endpush
