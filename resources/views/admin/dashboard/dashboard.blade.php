@extends('layouts.admin.admin')

@section('content')
    <!-- Subir documento -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plyr.css') }}">
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/pages/dropzone.js') }}"></script>
    <script src="{{ asset('js/plyr.js') }}"></script>
    <script src="{{ asset('js/pages/viewGroup.js') }}"></script>
@section('title-page')
    {{--    {{ trans($proyect_data[0]['proyect_name'])}}--}}
@endsection
@section('breadcrumbs')
    {{--    {{ Breadcrumbs::render('group.view', $proyect_data[0]['proyect_name']) }}--}}
@endsection
@php
    $url_background =asset("/media/photos/photo23@2x.jpg");
@endphp
<div class="row">
    <div class="col-12">
        <div class="block block-rounded">
            <div class="block-content">
                @php
                    //dd($Company);
                @endphp
                <h3>{{$dataUserCompany->company->company_name}}</h3>
                <div class="row">
                    <div class="col-6 text-left">
                        <h4 class="py-1 px-2">{{__('dashboard.t1')}}</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route("dashboard.register.add")}}" class="btn rounded-pill btn-primary py-1">Add</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-vcenter ">
                    <thead>
                    <tr class="table-primary">
                        <th>Name</th>
                        <th class="d-none d-md-table-cell">Last Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Position</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Movil</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registers as $register)
                        <tr>
                            <td class="fw-semibold fs-sm">
                                <a href="#">{{$register->first_name}}</a>
                            </td>
                            <td class="fw-semibold fs-sm">
                                {{$register->last_name}}
                            </td>
                            <td class="fw-semibold fs-sm">
                                {{$register->position}}
                            </td>
                            <td class="d-none d-md-table-cell fs-sm">
                                {{$register->email}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{$register->phone}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-6 text-left">
                        <h4 class="py-1 px-2">{{__('dashboard.t2')}}</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route("dashboard.document.add")}}" class="btn rounded-pill btn-primary py-1">Add</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr class="table-primary">
                        <th>Document to shared</th>
                        <th class="d-none d-md-table-cell">Date</th>
                        <th class="d-none d-sm-table-cell">Description</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="fw-semibold fs-sm">
                            <a href="#">Docuemnt01</a>
                        </td>
                        <td class="fw-semibold fs-sm">
                            28-04-22
                        </td>
                        <td class="fw-semibold fs-sm">
                            Is the principal Document
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                    <i class="fa fa-fw fa-download"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js_after')

@endpush
