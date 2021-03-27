@extends('layouts.admin.admin')

@section('content')
<!-- Subir documento -->

@section('title-page')
{{ __('proyects.name')}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('proyects') }}
@endsection



<!-- Page Content -->
<div class="content">
    <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _js/pages/be_forms_wizard.js) -->
    <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

    <!-- Progress Wizards -->
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">&nbsp;</h3>
                </div>
                <div class="block-content">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="wizard-progress-name">Nombre proyectto</label>
                            <input type="text" class="form-control" name="proyect_name">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress-name">Descripción proyecto</label>
                            <textarea class="form-control" id="example-textarea-input" name="proyect_description"
                                      rows="8" placeholder="Descripción grupo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress-name"> Fecha inicio</label>
                            <input type="date" name="proyect_start" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress-name">Fecha final</label>
                            <input type="date" name="proyect_end" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress-name">Usuario asignado</label>
                            <select name="user_id" class="form-control" id="">Seleccione una opcion
                                <option value="1">user name</option>
                            </select>
                        </div>


                        <div class="mb-2 text-right col-12">

                            <button type="submit" class="btn btn-primary ">
                                <i class="mr-1 fa fa-check"></i> Enviar
                            </button>
                        </div>

                    </form>
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
