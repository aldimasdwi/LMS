@extends('layouts.backend.app',[
'title' => 'Manage Kelas',
'contentTitle' => 'Manage Kelas',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="templates/backend/AdminLTE-3.0.1/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<x-alert></x-alert>

<div class="page-content container-fluid">
    @if(Auth::User()->status_id === 2 || Auth::User()->status_id === 4 || Auth::User()->status_id === 5 || Auth::User()->status_id === 6)
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
    </div>
    @endif
    <div class="row">
        @forelse ($kelass as $kelas)
        <div class="col-lg-4 col-sm-12">
            <div class="card border-bottom border-info rounded">
                <div class="card-body">
                    <div>
                        {{-- @dd(asset('a')) --}}
                        <img src="{{ asset($kelas->thumbnail) }}" class="w-100">
                        <h4 class="">{{$kelas->nama_kelas}}</h4>
                        <p>{{ $kelas->deskripsi }}</p>

                        <div class="d-flex justify-content-center gap-3">

                            <a href="{{ route('admin.kelas.show', $kelas->slug) }}" class="btn btn-success">Akses
                                Kelas</a>

                                @if(Auth::User()->status_id === 2 || Auth::User()->status_id === 4 || Auth::User()->status_id === 5 || Auth::User()->status_id === 6)
                            <a href="{{ route('admin.kelas.edit', $kelas->slug) }}" class="btn btn-info">Edit</a>

                            <form class="span" method="POST" action="{{ route('admin.kelas.destroy', $kelas->slug) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" onclick="return confirm('Hapus?')"
                                    value="Hapus">
                            </form>
                            @endif
                        </div>
                        {{-- @can('viewAny') --}}
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tidak tersedia</h4>
                <p class="card-text">Maaf, untuk saat ini belum ada kelas tersedia untuk jurusan {{
                    auth()->user()->personal_data->jurusan->name }}</p>
            </div>
        </div>

        @endforelse
    </div>
</div>
{{--
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">

                <table id="dataTable1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Deskripsi</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp

                        @foreach($kelas as $kelasMat)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><a href="{{ route('admin.kelas.show', $kelasMat->slug) }}">{{ $kelasMat->nama_kelas
                                    }}</a></td>
                            <td>{{ $kelasMat->deskripsi }}</td>
                            <td>{{ $kelasMat->jurusan->name }}</td>

                            <td>
                                <div class="row ml-2">
                                    <a href="{{ route('admin.kelas.edit',$kelasMat->slug) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>

                                    <form method="POST" action="{{ route('admin.kelas.destroy',$kelasMat->slug) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus ?')" type="submit"
                                            class="btn btn-danger btn-sm ml-2"><i
                                                class="fas fa-trash fa-fw"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
@stop
