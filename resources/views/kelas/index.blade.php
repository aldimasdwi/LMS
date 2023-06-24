@extends('layouts.frontend.app',[
'title' => 'List Kelas',
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
                    <h3>List Kelas</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($kelass as $kelas)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @php
                    $thumbnail = $kelas->thumbnail ?? 'default-materi-thumbnail.png';
                    @endphp
                    <img class="card-img-top" src="{{ asset('uploads/img/materi/'.$thumbnail) }}" width="100%"
                        style="height: 300px; object-fit: cover; object-position: center;">
                    <div class="card-body">
                        <a class="stretched-link fs-3 text-capitalize w-100 text-center d-block"
                            href="{{ route('admin.kelas.show',$kelas->slug) }}">
                            {{ $kelas->nama_kelas }}
                        </a>
                    </div>
                    {{-- @php
                    $available = new \Illuminate\Support\Carbon($kelas->tersedia);
                    $isAvailable = $available->lessThanOrEqualTo(now());
                    @endphp
                    @if (!$isAvailable)
                    <span class="badge badge-info float-right">Tersedia
                        {{$available->locale('id')->diffForHumans()}}</span>
                    @endif --}}
                </div>
            </div>
            @endforeach
            <div class="col-lg pagination pagination-center justify-content-center">
                {{ $kelass->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</section>
@stop