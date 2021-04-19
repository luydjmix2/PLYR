@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ __('')}}
@endsection
<!-- Crear usuario -->

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Usuarios
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><a class="" href="{{ route('users.index') }}"> Usuarios</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('users.show', $user) }}">Ver</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->



<!-- Page Content -->
<div class="content">
    <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _js/pages/be_forms_wizard.js) -->
    <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

    <!-- Progress Wizards -->
    <div class="row">
        <div class="col-md-12">
            <p>
                <a href="{{url()->previous()}}">Volver</a>
            </p>
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Informacion</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-6">
                            <label for="wizard-progress-name">nombre</label>
                            <p>
                                {{ $user->name }}
                            </p>
                        </div>
                        <div class="col-6">
                            <label for="wizard-progress-email">Email</label>
                            <p>
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="wizard-progress-movil">Movil</label>
                            <p>
                                {{ $user->movil }}
                            </p>
                        </div>
                        <div class="col-6">
                            <label for="wizard-progress-phone">Teléfono</label>
                            <p>
                                {{ $user->phone }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="wizard-progress-appointment">Cargo</label>
                            <p>
                                {{ $user->appointment }}
                            </p>
                        </div>
                        <div class="col-6">
                            <label for="wizard-progress-email">Bloomberg Email</label>
                            <p>
                                {{ $user->bloomber_email }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="wizard-progress-signing">Firma</label>
                            <p>
                                {{ $user->signing }}
                            </p>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Progress Wizards -->
</div>
<!-- END Page Content -->



@endsection

@push('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/be_forms_wizard.min.js') }}"></script>
@endpush
