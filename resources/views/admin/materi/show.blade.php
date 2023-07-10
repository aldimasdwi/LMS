@extends('layouts.backend.app',[
'title' => 'Baca materi',
'contentTitle' => 'Baca Materi',
])
@section('content')
<x-breadcrumbs :route-parameters="$routeParameters"></x-breadcrumbs>
<div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400"
    style="background-image: url({{ asset($materi->getThumbnail()) }});">
    <div class="blog-details-headline">
        <h3>{{ $materi->judul }}</h3>
        <div class="meta d-flex align-items-center justify-content-center">
            <a href="#">{{ $materi->user->author }}</a>
            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
            <a href="#">{{ $materi->kelas->nama_kelas }}</a>
        </div>
    </div>
</div>

<div class="page-wrapper" style="display: block;">
    <div class="page-breadcrumb bg-white">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0"> Materi
                </h5>
            </div>
            <div class="col-lg-7 col-md-8 col-xs-12 align-self-center">

            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div id="app">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <span>{!! $materi->deskripsi !!}</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- ##### Catagory Area End ##### -->
@stop
