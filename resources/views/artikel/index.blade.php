@extends('layouts.frontend.app',[
'title' => 'List Artikel',
])
@section('content')
<!-- ##### Blog Area Start ##### -->
@if ($errors->any('tersedia'))
    <div class="fixed-top w-100 bg-danger p-1 text-center" onclick="this.remove()">
        <h6 class="text-white">
            {{ $errors->first('tersedia') }}
        </h6>
    </div>
@endif
<section class="blog-area section-padding-100-0 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>List Artikel</h3>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach($artikel as $art)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        {{ $art->judul }}

                        <span class="badge badge-danger float-right">by : {{ $art->user->name }}</span>
                        @php
                        $available = new \Illuminate\Support\Carbon($art->tersedia);
                        $isAvailable = $available->lessThanOrEqualTo(now());
                        @endphp
                        @if (!$isAvailable)
                        <span class="badge badge-info float-right">Tersedia {{$available->locale('id')->diffForHumans()}}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('uploads/img/artikel/'.$art->thumbnail) }}" width="100%"
                            style="height: 300px; object-fit: cover; object-position: center;">

                        <div class="card-text mt-3">
                            {{ Str::limit(strip_tags($art->deskripsi)) }}
                        </div>

                        <a href="{{ route('artikel.show',$art->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg pagination pagination-center justify-content-center">
                {{ $artikel->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</section>
@stop