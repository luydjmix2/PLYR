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
        <div class="float-right col-2 float-right-btn-force">
            <a href="{{route('groups.create')}}" class="mb-3 mr-1 btn btn-info"> 
                <i class="fa fa-fw fa-{{ __('bts.add-icon')}}"></i> {{ __('bts.add')}}
            </a>
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
                    <th style="width: 100px !important;">{{ __('proyects.acctions')}}</th>
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
                        {{Helper::dataUserName($proyect->user_id) }}
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary tooltip-bts" data-toggel="0" data-action="toltips-alert-acctions-group-{{$proyect->id}}">{{__('bts.actions')}}</button>
                        <br>
                        <div class="tooltip-bts-alerts-hidden tooltip-bts-alerts list-btns-actions" id="toltips-alert-acctions-group-{{$proyect->id}}">
                            <div class="list-flex-conten-btns">
                                <a href="/group/{{ $proyect->proyect_url }}" class="btn btn-sm btn-warning js-tooltip-enabled">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a> 
                                <a href="{{route('groups.edit',$proyect->id)}}" class="btn btn-sm btn-info js-tooltip-enabled">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a> 
                                <form method="POST" action=""
                                      style="display:inline;">
                                    {{ csrf_field() }} {{ method_field('groups.delete') }}
                                    <button class="btn btn-sm btn-danger js-tooltip-enabled"
                                            onclick="return confirm('{{ __('proyects.alert_delete')}}')"><i
                                            class="fa fa-fw fa-times"></i></button>
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

