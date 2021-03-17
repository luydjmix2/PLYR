@extends('layouts.admin.admin')

@section('content')
    <!-- Crear usuario -->

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Documentos
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="" href="{{ route('documents.index') }}"> Documentos</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('documents.edit', $document) }}">Editar</a>
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
                <!-- Progress Wizard -->
                <div class="js-wizard-simple block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-progress-step1" data-toggle="tab">1. Basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">2. Details</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Wizard Progress Bar -->
                    <div class="block-content block-content-sm">
                        <div class="progress" data-wizard="progress" style="height: 8px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- END Wizard Progress Bar -->

                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-progress-name">proyecto</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="proyect_Id"
                                    value="{{ $document->proyect_Id }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-progress-name">Grupo</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="group_Id"
                                    value="{{ $document->group_Id }}">
                            </div>

                            <div class="form-group">
                                <label for="wizard-progress-name">Grupo personalizado</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="groupCustom_Id"
                                    value="{{ $document->groupCustom_Id }}">
                            </div>

                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-progress-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-progress-name">nombre</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="name"
                                    value="{{ $document->name }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-progress-name">formato</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="formato"
                                    value="{{ $document->formato }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-progress-name">url</label>
                                <input class="form-control" type="text" id="wizard-progress-name" name="url"
                                    value="{{ $document->url }}">
                            </div>

                        </div>
                        <!-- END Step 2 -->
                    </div>
                    <!-- END Steps Content -->

                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-alt-primary" data-wizard="prev">
                                    <i class="fa fa-angle-left mr-1"></i> Anterior
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-alt-primary" data-wizard="next">
                                    Siguiente <i class="fa fa-angle-right ml-1"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                    <!-- END Form -->
                </div>
                <!-- END Progress Wizard -->
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
