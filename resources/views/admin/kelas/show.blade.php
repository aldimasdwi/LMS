@extends('layouts.backend.app',[
'title' => 'Manage Kelas',
'contentTitle' => 'Manage Kelas',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<x-alert></x-alert>
<x-breadcrumbs :route-parameters="$routeParameters"></x-breadcrumbs>

<div class=" tab-content tabcontent-border p-4">
    @if(Auth::User()->status_id === 2 || Auth::User()->status_id === 4 || Auth::User()->status_id === 5 || Auth::User()->status_id === 6)
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.kelas.materi.create', request()->route('kelas')) }}"
                class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        @endif
    <div id="materi" role="tabpanel" class="tab-pane active show">
        <div id="accordion2" role="tablist" aria-multiselectable="true" class="accordion">
            <span>
                <span>
                    @foreach ($kelass->tabMateri as $tab)
    <div class="card">
        <div role="tab" id="heading{{$loop->iteration}}" class="card-header">
            <h5 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$loop->iteration}}"
                    aria-controls="'collapse'+key_section" target="_blank">
                    {{ $tab->judul }}
                </a>
            </h5>
        </div>
        <div id="collapse{{$loop->iteration}}" role="tabpanel" aria-labelledby="heading{{$loop->iteration}}"
            class="collapse show">
            <div class="card-body list-group">
                <ul>
                    @forelse ($tab->materi->sortBy('tersedia') as $materi)
                        <div class="d-flex flex-row align-items-center">
                            @if (collect($materiExpired)->contains('id', $materi->id))
                                <a class="list-group-item flex-fill"
                                    href="{{ route('admin.kelas.materi.show', [$kelass->slug, $materi->slug]) }}">
                                    <p>{{ $materi->judul }}</p>
                                </a>
                                <p class="list-group-item">{{ $materi->tersedia }}</p>
                            @endif
                            @if (collect($materiTersedia)->contains('id', $materi->id))
                                <p class="list-group-item flex-fill">{{ $materi->judul }}</p>
                                <p class="list-group-item">{{ $materi->tersedia }}</p>
                            @endif
                            @if(Auth::User()->status_id === 2 || Auth::User()->status_id === 4 || Auth::User()->status_id === 5 || Auth::User()->status_id === 6)
                            <span class="list-group-item d-flex">
                                <a class="btn btn-info"
                                    href="{{ route('admin.kelas.materi.edit', [$kelass->slug, $materi->slug]) }}">
                                    <u>Edit</u>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal">Hapus</a>
                                @include('layouts.backend.materi-modal', ['materi' => $materi, 'kelass' => $kelass])
                            </span>
                            @endif
                        </div>
                    @empty
                        <ul class="list-group">
                            <li class="list-group-item col">
                                <span>Belum ada materi</span>
                            </li>
                        </ul>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endforeach
                </span>
            </span>
        </div>
    </div>
</div>
</div>


@stop
{{-- @push('js')
<!-- DataTables -->
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
</script>
<script>
    $(function () {
    $("#dataTable1").DataTable();
  });
</script>
@endpush --}}
