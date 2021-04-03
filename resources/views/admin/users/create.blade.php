@extends('layouts.admin.admin')

@section('content')

@section('title-page')
{{ __('proyects.name')}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render(__('proyects.name').'.create') }}
@endsection

<!-- Page Content -->
<div class="content">
    <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _js/pages/be_forms_wizard.js) -->
    <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

    <!-- Progress Wizards -->
    <div class="row">
        <div class="col-md-12">
            <!-- Progress Wizard -->
            <div class="js-wizard-simple block block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-progress-step1" data-toggle="tab">1. Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">2. Company Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-progress-step3" data-toggle="tab">3. Contact Information</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(['route'=> 'group.user.store', 'method' => 'POST', 'id' => 'userCreate' ]) !!}
                @csrf

                <!-- Wizard Progress Bar -->
                <div class="block-content block-content-sm">
                    <div class="progress" data-wizard="progress" style="height: 8px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 34.3333%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <!-- END Wizard Progress Bar -->

                <!-- Steps Content -->
                <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                    <!-- Step 1 -->
                    <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                        <div class="form-group">
                            {{Form::label('first_name', __('users.first_name'))}}
                            {{Form::text('first_name',old('last_name'), ['class'=>'form-control', "id"=>"first_name"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('last_name', __('users.last_name'))}}
                            {{Form::text('last_name',old('last_name'), ['class'=>'form-control', "id"=>"last_name"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', __('users.email'))}}
                            {{Form::text('email',old('email'), ['class'=>'form-control', "id"=>"email"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password', __('users.password'))}}
                            {{Form::password('password', ['class'=>'form-control', "id"=>"password"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password_confirmation', __('users.password_confirmation'))}}
                            {{Form::password('password_confirmation', ['class'=>'form-control', "id"=>"password-confirm"])}}
                        </div>
                    </div>
                    <!-- END Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane" id="wizard-progress-step2" role="tabpanel">
                        <div class="form-group">
                            {{Form::label('firm', __('users.firm'))}}
                            {{Form::text('firm',old('firm'), ['class'=>'form-control', "id"=>"firm"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('position', __('users.position'))}}
                            {{Form::text('position',old('position'), ['class'=>'form-control', "id"=>"position"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('company', __('users.company'))}}
                            {{Form::text('company',old('company'), ['class'=>'form-control', "id"=>"company"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start_date', __('users.start_date'))}}
                            {{Form::date('start_date',old('start_date'), ['class'=>'form-control', "id"=>"start_date"])}}
                        </div>
                    </div>
                    <!-- END Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane" id="wizard-progress-step3" role="tabpanel">
                        <div class="form-group">
                            {{Form::label('bloomberg_email', __('users.bloomberg_email'))}}
                            {{Form::text('bloomberg_email',old('bloomberg_email'), ['class'=>'form-control', "id"=>"bloomberg_email"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', __('users.phone'))}}
                            {{Form::text('phone',old('phone'), ['class'=>'form-control', "id"=>"phone"])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('movil', __('users.movil'))}}
                            {{Form::text('movil',old('movil'), ['class'=>'form-control', "id"=>"movil"])}}
                        </div>
                    </div>
                    <!-- END Step 3 -->
                </div>
                <!-- END Steps Content -->

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-alt-primary disabled" data-wizard="prev">
                                <i class="fa fa-angle-left mr-1"></i> {{__('bts.previous')}}
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-alt-primary" data-wizard="next">
                                {{__('bts.next')}} <i class="fa fa-angle-right ml-1"></i>
                            </button>
                            <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                <i class="fa fa-check mr-1"></i> {{__('bts.submit')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
                {!! Form::close() !!}
                <!-- END Form -->
            </div>
            <!-- END Progress Wizard -->
        </div>

    </div>
    <!-- END Progress Wizards -->
</div>
<!-- END Page Content -->



@endsection

@section('js_after') 
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/be_forms_wizard.min.js') }}"></script>
@endsection
