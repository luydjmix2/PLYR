@extends('layouts.admin.admin')

@section('content')
    <!-- Crear usuario -->

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Grupos
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="" href="{{ route('groups.index') }}"> Grupos</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('groups.edit', $group) }}">Editar</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->



    <!-- Page Content -->
    <div class="content">

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
