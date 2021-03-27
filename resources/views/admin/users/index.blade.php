@extends('layouts.admin.admin')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Usuarios
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Usuarios</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('users.index') }}">Listado</a>
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
                <a href="{{ route('users.create') }}"> <button type="button" class="btn btn-info mr-1 mb-3">
                        <i class="fa fa-fw fa-plus"></i> Añadir
                    </button></a>
            </div>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">ID</th>
                        <th>Nombre</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Cargo</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Teléfono</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Movil</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Correo Bloomberg </th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Firma</th>
                        <th class="d-none d-sm-table-cell" style="width: 11,25%;">Registro</th>
                        <th style="width: 11,25%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center font-size-sm">{{ $user->id }}</td>
                            <td class="font-w600 font-size-sm">
                                <a href="{{ route('users.edit', $user) }}">{{ $user->name }}</a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                <em class="text-muted">{{ $user->email }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $user->appointment }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $user->phone }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $user->movil }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $user->bloomber_email }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $user->signing }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{ $user->created_at }}</em>
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user) }}">
                                    <button type="button" class="btn btn-warning mr-1 mb-3">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                </a> &nbsp;
                                <a href="{{ route('users.edit', $user) }}">
                                    <button type="button" class="btn btn-info mr-1 mb-3">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a> &nbsp;
                                <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline;">
                                    @csrf {{ method_field('DELETE') }}
                                    <button class="btn btn-danger mr-1 mb-3"
                                        onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')"><i
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
