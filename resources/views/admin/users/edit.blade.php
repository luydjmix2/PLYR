@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ trans('users.namePageEdit') }}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render(trans('users.namePageEdit'), $user->id) }}
@endsection

<!-- Page Content -->
<div class="content">
    <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _js/pages/be_forms_wizard.js) -->
    <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

    <!-- Basic -->
    <div class="block block-rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="block-content">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {!! Form::open(['route'=> 'users.update', 'method' => 'POST', 'id' => 'userCreate' ]) !!}
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{Form::label('first_name', __('users.first_name'))}}
                                {{Form::text('first_name', $user->first_name, ['class'=>'form-control', "id"=>"first_name"])}}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">                        
                                {{Form::label('last_name', __('users.last_name'))}}
                                {{Form::text('last_name', $user->last_name, ['class'=>'form-control', "id"=>"last_name"])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{Form::label('company', __('users.companyN'))}}
                                {{Form::text('company', Helper::valideNameCompany($user->id), ['class'=>'form-control', "id"=>"company"])}}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">                        
                                {{Form::label('email', __('users.email'))}}
                                {{Form::text('email', $user->email, ['class'=>'form-control', "id"=>"email"])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{Form::label('password', __('users.password'))}}
                                {{Form::password('password', ['class'=>'form-control', "id"=>"password"])}}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">                        
                                {{Form::label('password_confirmation', __('users.password_confirmation'))}}
                                {{Form::password('password_confirmation', ['class'=>'form-control', "id"=>"password-confirm"])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{Form::label('profile', __('users.profile'))}}
                                {{Form::select('profile', Helper::listProfile(), $user->profile, ['class'=>'form-control', "id"=>"profile"])}}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">                        

                            </div>
                        </div>
                    </div>
                    {{Form::hidden('user_id', $user->id)}}
                    <div class="mb-2 text-right col-12">

                        {{Form::button('<i class="fa fa-user-plus"></i> Create', ['type' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary'])}}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- END Basic -->

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
