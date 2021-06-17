@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ trans('users.namePage') }}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render(trans('users.namePage')) }}
@endsection

<!-- Dynamic Table with Export Buttons -->
<div class="block block-rounded">

    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

        <div class="col-2 float-right float-right-btn-force">
            <a href="{{ route('users.create') }}"  class="btn btn-info mr-1 mb-3"> 
                <i class="fa fa-fw fa-@lang('bts.add-icon')"></i>{{trans('bts.add')}}
            </a>
        </div>
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>Nombre</th>
                    <th class="d-none d-sm-table-cell" style="width: 11,25%;">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 6%;">Status</th>
                    <th style="width: 100px !important;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center font-size-sm">{{ $user->id }}</td>
                    <td class="font-w600 font-size-sm">
                        <a href="{{ route('users.index', $user) }}">{{ $user->name }}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm">
                        <em class="text-muted">{{ $user->email }}</em>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm">
                        <em class="text-muted">{{Helper::statusViewUser($user->id, 'text')}}</em>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary tooltip-bts" data-toggel="0" data-action="toltips-alert-acctions-users-{{$user->id}}">{{__('bts.actions')}}</button>
                        <br>
                        <div class="tooltip-bts-alerts-hidden tooltip-bts-alerts list-btns-actions" id="toltips-alert-acctions-users-{{$user->id}}">
                            <div class="list-flex-conten-btns">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info js-tooltip-enabled">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                
                                <a href="{{ route('users.status', $user->id) }}" class="{{Helper::statusViewUser($user->id, 'bts')}} js-tooltip-enabled">
                                    <i class="fa fa-fw {{Helper::statusViewUser($user->id, 'icon')}}"></i>
                                </a>
                                <form method="POST" action="{{ route('users.index', $user) }}" style="display:inline;">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-sm btn-danger js-tooltip-enabled" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')">
                                        <i class="fa fa-fw fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table with Export Buttons -->

@endsection

@section('js_before')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/css/plyr.css') }}">
<script src="{{ asset('js/plyr.js') }}"></script>
@stop

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
