@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ __('proyects.name')}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('Groups') }}
@endsection
<!-- Dynamic Table with Export Buttons -->
<div class="block block-rounded">

    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <div class="float-right col-md-1">
            <a href="{{route('groups.create')}}"> <button type="button" class="mb-3 mr-1 btn btn-info">
                    <i class="fa fa-fw fa-{{ __('bts.add-icon')}}"></i> {{ __('bts.add')}}
                </button></a>
        </div>
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">#</th>
                    <th>{{ __('proyects.nameProyects')}}</th>
                    <th>{{ __('proyects.description')}}</th>
                    <th>{{ __('proyects.start_date')}}</th>
                    <th>{{ __('proyects.end_date')}}</th>
                    <th>{{ __('proyects.user')}}</th>
                    <th>{{ __('proyects.upload_file')}}</th>
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
                        {{ dataUserName($proyect->user_id) }}
                    </td>
                    <td class="font-w600 font-size-sm">
                        <a href="/group/{{ $proyect->proyect_url }}" class="mb-3 mr-1 btn btn-warning">
                            <i class="fa fa-file-upload"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/group/{{ $proyect->proyect_url }}" class="mb-3 mr-1 btn btn-warning">
                            <i class="fa fa-fw fa-eye"></i>
                        </a> &nbsp;
                        <a href="" class="mb-3 mr-1 btn btn-info">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a> &nbsp;
                        <form method="POST" action=""
                              style="display:inline;">
                            {{ csrf_field() }} {{ method_field('groups.delete') }}
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
