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
                <h3>{{__('register.t1')}}</h3>
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
                        <div class="block">
                            <div class="content col-xl-10">
                                <form action="{{route("dashboard.document.update", $document->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-row">
                                        <div class="col-12">
                                            <label for="example-text-input">Document Name</label>
                                            <br>
                                            <p class="my-3"><b>{{$document->document_name}}</b></p>
                                        </div>
                                        <div class="col-6">
                                            <label for="example-email-input">Description</label>
                                            <textarea class="form-control" id="description"
                                                   name="description"
                                                      placeholder="Description">{{$document->description}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm col-2">Save</button>
                                </form>
                            </div>
                            <div class="block-content col-xl-10">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>Document to shared</th>
                                        <th class="d-none d-md-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($documents as $documen)
                                        <tr>
                                            <td class="fw-semibold fs-sm">
                                                <a href="#">{{$documen->document_name}}</a>
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$documen->created_at}}
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$documen->description}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
