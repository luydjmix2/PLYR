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
            {!! Form::open(['url' => 'foo/bar', 'method' => 'POST', 'files' => true]) !!}
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
                        <label for="one-profile-edit-email">{{__('company.form_title')}}</label>
                        <input type="email" class="form-control" id="one-profile-edit-email" name="one-profile-edit-email" placeholder="Enter your email.." value="john.parker@example.com">
                    </div>
                    <div class="form-group">
                        <label>{{__('company.form_title')}}</label>
                        <div class="push">
                            <img class="img-avatar" src="{{ asset('media/avatars/avatar13.jpg') }}" alt="">
                        </div>
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="one-profile-edit-avatar" name="one-profile-edit-avatar">
                            <label class="custom-file-label" for="one-profile-edit-avatar">Choose a new logo</label>
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

    <!-- Change Password -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Change Password</h3>
        </div>
        <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="one-profile-edit-password">Current Password</label>
                            <input type="password" class="form-control" id="one-profile-edit-password" name="one-profile-edit-password">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="one-profile-edit-password-new">New Password</label>
                                <input type="password" class="form-control" id="one-profile-edit-password-new" name="one-profile-edit-password-new">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="one-profile-edit-password-new-confirm">Confirm New Password</label>
                                <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" name="one-profile-edit-password-new-confirm">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Change Password -->

    <!-- Billing Information -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Billing Information</h3>
        </div>
        <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted">
                            Your billing information is never shown to other users and only used for creating your invoices.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="one-profile-edit-company-name">Company Name (Optional)</label>
                            <input type="text" class="form-control" id="one-profile-edit-company-name" name="one-profile-edit-company-name">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="one-profile-edit-firstname">Firstname</label>
                                <input type="text" class="form-control" id="one-profile-edit-firstname" name="one-profile-edit-firstname">
                            </div>
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Lastname</label>
                                <input type="text" class="form-control" id="one-profile-edit-lastname" name="one-profile-edit-lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="one-profile-edit-street-1">Street Address 1</label>
                            <input type="text" class="form-control" id="one-profile-edit-street-1" name="one-profile-edit-street-1">
                        </div>
                        <div class="form-group">
                            <label for="one-profile-edit-street-2">Street Address 2</label>
                            <input type="text" class="form-control" id="one-profile-edit-street-2" name="one-profile-edit-street-2">
                        </div>
                        <div class="form-group">
                            <label for="one-profile-edit-city">City</label>
                            <input type="text" class="form-control" id="one-profile-edit-city" name="one-profile-edit-city">
                        </div>
                        <div class="form-group">
                            <label for="one-profile-edit-postal">Postal code</label>
                            <input type="text" class="form-control" id="one-profile-edit-postal" name="one-profile-edit-postal">
                        </div>
                        <div class="form-group">
                            <label for="one-profile-edit-vat">VAT Number</label>
                            <input type="text" class="form-control" id="one-profile-edit-vat" name="one-profile-edit-vat" value="IT00000000" disabled>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Billing Information -->

    <!-- Connections -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Connections</h3>
        </div>
        <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                        You can connect your account to third party networks to get extra features.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn btn-block btn-alt-danger text-left" href="javascript:void(0)">
                                <i class="fab fa-fw fa-google opacity-50 mr-1"></i> Connect to Google
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn btn-block btn-alt-info text-left" href="javascript:void(0)">
                                <i class="fab fa-fw fa-twitter opacity-50 mr-1"></i> Connect to Twitter
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn btn-block btn-alt-primary bg-transparent d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>
                                    <i class="fab fa-fw fa-facebook mr-1"></i> John Doe
                                </span>
                                <i class="fa fa-fw fa-check mr-1"></i>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center font-size-sm">
                            <a class="btn btn-sm btn-light btn-rounded" href="javascript:void(0)">
                                <i class="fa fa-fw fa-pencil-alt mr-1"></i> Edit Facebook Connection
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn btn-block btn-alt-warning bg-transparent d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>
                                    <i class="fab fa-fw fa-instagram mr-1"></i> @john_doe
                                </span>
                                <i class="fa fa-fw fa-check mr-1"></i>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center font-size-sm">
                            <a class="btn btn-sm btn-light btn-rounded" href="javascript:void(0)">
                                <i class="fa fa-fw fa-pencil-alt mr-1"></i> Edit Instagram Connection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Connections -->
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
