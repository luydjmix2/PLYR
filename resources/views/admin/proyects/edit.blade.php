@extends('layouts.admin.admin')

@section('content')

@section('title-page')
{{ __('proyects.name')}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render(__('proyects.name').'.create') }}
@endsection


<!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _js/pages/be_forms_wizard.js) -->
<!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

<!-- Progress Wizards -->
<div class="row">
    <div class="col-md-12">
        <div class="block">
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
                {!! Form::open(['route'=> 'groups.update', 'method' => 'POST', 'files'=>'true', 'id' => 'proyectCreate' ]) !!}
                @csrf
                {{Form::hidden('group_id', $group->id)}}
                <div class="form-group">
                    {{Form::label('wizard-progress-name', __('proyects.nameProyects'))}}
                    {{Form::text('proyect_name', $group->proyect_name, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">                        
                    {{Form::label('wizard-progress-name', __('proyects.description'))}}
                    {{Form::textarea('proyect_description', $group->proyect_description, ['class'=>'form-control', 'row'=> '8'])}}
                </div>
                <div class="form-group">
                    {{Form::label('wizard-progress-name', __('proyects.start_date'))}}
                    {{Form::date('proyect_start', $group->proyect_start,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('wizard-progress-name', __('proyects.end_date'))}}
                    {{Form::date('proyect_end', $group->proyect_end, ['class'=>'form-control'])}}
                </div>
                <div class="mb-2 text-right col-12">

                    {{Form::button('<i class="fa fa-archive"></i> Create', ['type' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary'])}}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
<!-- END Progress Wizards -->




@endsection

@section('js_after') 

<script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

@endsection
