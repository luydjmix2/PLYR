@extends('layouts.admin.admin')

@section('content')
<!-- Subir documento -->
<link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/pages/dropzone.js') }}"></script>
@section('title-page')
{{ __($proyect_data[0]['proyect_name'])}}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('proyect.view', $proyect_data[0]['proyect_name']) }}
@endsection 
@php
print_r($proyect_data);
print_r($user);
print_r($files);
@endphp


<!-- Hero Content -->
<div class="bg-image" style="background-image: url('{{asset("/media/photos/photo23@2x.jpg")}}');">
     <div class="bg-primary-op">
        <div class="content content-full overflow-hidden">
            <div class="my-8 text-center">
                <h1 class="text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$user[0]['signing']}}</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$proyect_data[0]['proyect_description']}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-boxed">
        <div class="row">
            <div class="col-12">
                {!! Form::open(['route'=> 'proyect.file', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                <div class="dz-message" style="height:200px;">
                    Drop your files here
                </div>
                <div class="dropzone-previews"></div>
                <button type="submit" class="btn btn-success" id="submit">Save</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Files</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Name</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <th class="text-center" scope="row">{{$file['id']}}</th>
                                    <td class="font-w600 font-size-sm">
                                        <a href="#">{{$file['document_name']}}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-warning">Trial</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<!-- More Stories -->
<div class="content content-boxed">
    <!-- Section Content -->
    <div class="row py-5">
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image: url('{{asset("/media/photos/photo2.jpg")}}');">
                     <h4 class="text-white mt-5 push">10 Productivity Tips</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Sara Fields</span> on July 2, 2019 · <em>12 min</em>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image: url('{{asset("/media/photos/photo10.jpg")}}');">
                     <h4 class="text-white mt-5 push">Travel &amp; Work</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Marie Duncan</span> on July 6, 2019 · <em>15 min</em>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image: url('{{asset("/media/photos/photo3.jpg")}}');">
                     <h4 class="text-white mt-5 push">New Image Gallery</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Brian Cruz</span> on June 29, 2019 · <em>10 min</em>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image: url('{{asset("/media/photos/photo23.jpg")}}');">
                     <h4 class="text-white mt-5 push">Explore the World</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Wayne Garcia</span> on June 16, 2019 · <em>13 min</em>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image:  url('{{asset("/media/photos/photo22.jpg")}}');">
                     <h4 class="text-white mt-5 push">Follow Your Dreams</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Carl Wells</span> on May 23, 2019 · <em>10 min</em>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content bg-image" style="background-image: url('{{asset("/media/photos/photo24.jpg")}}');">
                     <h4 class="text-white mt-5 push">Top 10 Destinations</h4>
                </div>
                <div class="block-content block-content-full font-size-sm">
                    <span class="text-primary">Amanda Powell</span> on May 15, 2019 · <em>7 min</em>
                </div>
            </a>
        </div>
    </div>
    <!-- END Section Content -->
</div>
<!-- END More Stories -->
@endsection

@push('js_after')

@endpush
