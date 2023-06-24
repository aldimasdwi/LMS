@extends('layouts.backend.app',[
'title' => 'Manage Materi',
'contentTitle' => 'Manage Materi',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
  href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<x-alert></x-alert>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('admin.materi.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="card-body table-responsive">
        <table id="dataTable1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Author</th>
              <th>Kelas</th>
              <th>Tersedia</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no=1;
            $past = new \Illuminate\Support\Carbon($materis->keys()[0])
            @endphp

            @foreach($materis as $date => $items)
            <tr>
              <td colspan="6">
                <h2>Hari ke-{{ $past->diffInDays($date) }}</h2>
              </td>
            </tr>
            @foreach ($items as $art)
            <tr>
              <td>{{ $no++ }}</td>
              <td><a href="{{ route('admin.materi.show', $art->slug) }}">{{ $art->judul }}</a></td>
              <td>{{ $art->user->name }}</td>
              <td><a href="{{ route('admin.kelas.show', $art->kelas->slug) }}">{{
                  $art->kelas->nama_kelas }}</a></td>
              <td>{{ (new \Illuminate\Support\Carbon($art->tersedia))->locale('id')->isoFormat('dddd, Do MMMM YYYY,
                h:mm') }}</td>

              <td>
                @if(auth()->user()->id == $art->user_id)
                <div class="row ml-2">
                  <a href="{{ route('admin.materi.edit',$art->id) }}" class="btn btn-primary btn-sm"><i
                      class="fas fa-edit fa-fw"></i></a>

                  <form method="POST" action="{{ route('admin.materi.destroy',$art->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus ?')" type="submit"
                      class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash fa-fw"></i></button>
                  </form>
                </div>
                @else
                <a href="javasript:void(0)" class="btn btn-danger btn-sm">
                  <i class="fas fa-ban"></i> No Action Available
                </a>
                @endif
              </td>
            </tr>
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
@push('js')
<!-- DataTables -->
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
</script>
<script>
  $(function () {
    $("#dataTable1").DataTable();
  });
</script>
@endpush