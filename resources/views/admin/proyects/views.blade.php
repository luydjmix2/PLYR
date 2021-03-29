@extends('layouts.admin.admin')

@section('content')
@section('title-page')
{{ __($proyect_data[0]['proyect_name'])}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('proyect.view', $proyect_data[0]['proyect_name']) }}
@endsection
hola
@php
print_r($proyect_data);
print_r($proyect_data[0]['proyect_name']);
@endphp

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
