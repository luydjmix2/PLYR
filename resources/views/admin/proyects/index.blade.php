@extends('layouts.admin.admin')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="my-2 flex-sm-fill h3">
                    {{ __('proyects.name')}}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ __('proyects.name')}}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('proyects') }}">{{ __('proyects.list')}}</a>
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
            <div class="float-right col-md-1">
                <a href="#"> <button type="button" class="mb-3 mr-1 btn btn-info">
                        <i class="fa fa-fw fa-plus"></i> {{ __('proyects.add')}}
                    </button></a>
            </div>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>{{ __('proyects.nameUser')}}</th>
                        <th>{{ __('proyects.description')}}</th>
                        <th>{{ __('proyects.start_date')}}</th>
                        <th>{{ __('proyects.end_date')}}</th>
                        <th>{{ __('proyects.user')}}</th>
                        <th style="width: 11,25%;">{{ __('proyects.acctions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyects as $proyect)
                        <tr>
                            <td class="text-center font-size-sm">{{ $proyect->id }}</td>
                            <td class="font-w600 font-size-sm">
                                {{ $proyect->proyect_name }}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{ $proyect->proyect_description }}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{ $proyect->proyect_start }}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{ $proyect->proyect_end }}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{ $proyect->user_id }}
                            </td>



                            <td>
                                <a href="#">
                                    <button type="button" class="mb-3 mr-1 btn btn-warning">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                </a> &nbsp;
                                <a href="">
                                    <button type="button" class="mb-3 mr-1 btn btn-info">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a> &nbsp;
                                <form method="POST" action=""
                                    style="display:inline;">
                                    {{ csrf_field() }} {{ method_field('proyects.delete') }}
                                    <button class="mb-3 mr-1 btn btn-danger"
                                        onclick="return confirm('{{ __('proyects.alert_delete')}}')"><i
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
