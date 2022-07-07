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
    {{__('myGroups.opt01')}}
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
                <h3>{{__('myGroups.opt01')}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        @if(is_array(session('success')))
                            <ul>
                                @foreach (session('success') as $succes)
                                    <li>{{ $succes }}</li>
                                @endforeach
                            </ul>
                        @else
                            {{ session('success') }}
                        @endif
                    </div>
                @endif
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        {{Form::open(['route' => 'mygroups.store', 'method' => 'post'])}}
                        <div class="block">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="example-text-input">Group Name</label><span class="text-danger"> *</span>
                                    <input type="text"  class="col-6 form-control" id="group_name" name="group_name" placeholder="Group Name">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Description</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <p>Fields marked with (<span class="text-danger">*</span>) means are required</p>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <h4>Shared Records</h4>
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="d-sm-table-cell text-center">Shared</th>
                                        <th class="d-sm-table-cell text-center">First Name</th>
                                        <th class="d-sm-table-cell text-center">Last Name</th>
                                        <th class="d-sm-table-cell text-center">Position</th>
                                        <th class="d-sm-table-cell text-center">Email</th>
                                        <th class="d-sm-table-cell text-center">Mobile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($registers as $register)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="check-register-group-{{$register->id}}" name="check-register-group[{{$register->id}}]" value="{{$register->id}}" checked="">
                                                <label class="custom-control-label" for="check-register-group-{{$register->id}}"></label>
                                            </div>
                                        </td>
                                        <td class="text-left">{{$register->first_name}}</td>
                                        <td class="text-left">{{$register->last_name}}</td>
                                        <td class="text-left">{{$register->position}}</td>
                                        <td class="text-left">{{$register->email}}</td>
                                        <td class="text-left">{{$register->movil}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <h4>Shared Documents</h4>
                                    <thead>
                                    <tr class="table-primary">
                                        <th class="d-sm-table-cell text-center">Shared</th>
                                        <th class="d-sm-table-cell text-center">Name</th>
                                        <th class="d-sm-table-cell text-center">Date</th>
                                        <th class="d-sm-table-cell text-center">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($documents as $document)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-dark mb-1">
                                                <input type="checkbox" class="custom-control-input" id="check-document-group-{{$document->id}}" name="check-document-group[{{$document->id}}]" value="{{$document->id}}" checked="">
                                                <label class="custom-control-label" for="check-document-group-{{$document->id}}"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">{{$document->document_name}}</td>
                                        <td class="text-left">{{$document->created_at}}</td>
                                        <td class="text-center">{{$document->description}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="block-options-item">
                                    <button type="submit" class="btn btn-primary btn-sm col-2">Save</button>
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                        <!-- END Bordered Table -->
                    </div>
                </div>
                <!-- END Page Container -->
            </div>
        </div>
    </div>
</div>


@endsection
@push('js_after')

@endpush
