@extends('layouts.admin.admin')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Documentos
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Documentos</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('documents.index') }}">Listado</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">

        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="col-md-1 float-right">
                <a href="{{ route('documents.create') }}"> <button type="button" class="btn btn-info mr-1 mb-3">
                        <i class="fa fa-fw fa-plus"></i> Añadir
                    </button></a>
            </div>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>proyecto</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Grupo</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Grupo personalizado</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">nombre</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">formato</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">url</th>

                        <th style="width: 11,25%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td class="text-center font-size-sm">{{ $document->id }}</td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_blank.html">{{ $document->proyect_Id }}</a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                <em class="text-muted">{{ $document->group_Id }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $document->groupCustom_Id }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $document->name }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $document->formato }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $document->url }}</em>
                            </td>

                            <td>
                                <a href="{{ route('documents.show', $document) }}">
                                    <button type="button" class="btn btn-warning mr-1 mb-3">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                </a> &nbsp;
                                <a href="{{ route('documents.edit', $document) }}">
                                    <button type="button" class="btn btn-info mr-1 mb-3">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a> &nbsp;
                                <form method="POST" action="{{ route('documents.destroy', $document) }}"
                                    style="display:inline;">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button class="btn btn-danger mr-1 mb-3"
                                        onclick="return confirm('¿Estás seguro de querer eliminar este documento?')"><i
                                            class="fa fa-fw fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->

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
