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
                <h3>{{__('document.t2')}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="page-container" class="page-header-dark content main-content-boxed col-xl-8">
                    <div class="col-xl-12">
                        <!-- Bordered Table -->
                        <div class="block">
                            <div class="content col-xl-10">
                                <h4 style="margin-bottom: 0px;">Upload Document</h4>
                                <p>Drag and drop one or more files from your device into the box below or click the box to manually select files.</p>
                                {{--                                <form class="dropzone dz-clickable" action="Plastillas Nuevas_03- Home sell side.html">--}}
                                {{--                                    <div class="dz-default dz-message" style="border: .125rem dashed #e1e1e1;">--}}
                                {{--                                        <button type="button" class="dz-button">Drop files here to upload</button>--}}
                                {{--                                    </div>--}}
                                {{--                                    <p class="text-center">Maximun weight per file is 20mb <br>--}}
                                {{--                                        10 files at a time per upload <br>--}}
                                {{--                                        Allowed Files: Ms Word, Excel, Power Point, adobe PDF and Images <br>--}}
                                {{--                                        (.docx, .xlsx, .pptx, .pdf, .jpg, .jpeg, .png)--}}
                                {{--                                    </p>--}}
                                {{--                                </form>--}}
                                {!! Form::open(['route'=> 'dashboard.document.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                                <div class="dz-message" style="height:200px;">
                                    Use drag and drop or click here to manually upload your files.
                                    <br>
                                    Maximum weight per file is 20 MB and 10 files limit per upload.
                                    <br>
                                    Allowed file types: Ms Word, Ms Excel and PDF files.
                                </div>
                                <div class="dropzone-previews"></div>
                                {!! Form::close() !!}
                            </div>
                            <div class="block-content col-xl-12">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>Document Name</th>
                                        <th class="d-none d-md-table-cell">Uploaded Date</th>
                                        <th class="d-none d-sm-table-cell">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($documents as $document)
                                        <tr>
                                            <td class="fw-semibold fs-sm">
                                                <a href="#">{{$document->document_name}}</a>
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$document->created_at}}
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                {{$document->description}}
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
