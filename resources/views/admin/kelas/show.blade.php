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

<div class="tab-content tabcontent-border p-4">
    <div id="info_kelas" role="tabpanel" class="tab-pane">
        <p>Tanggal Mulai Kelas : 02 Mei 2023</p>
        <p>Tanggal Selesai Kelas : 23 Juni 2023</p> <span>
            <p>Link channel materi :
                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light">
                    <!---->
                    Join Channel
                </button>
            </p>
        </span> <span>
            <p>Link grup diskusi :
                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light">
                    <!---->
                    Join Diskusi
                </button>
            </p>
        </span> <i>*Link channel materi telegram akan diupdate pada H-7 dan link grup diskusi akan diupdate H-1 sebelum
            kelas dimulai menyesuaikan jumlah peserta...</i><br> <i>**Apabila ada kendala, dapat menghubungi trainer
            bersangkutan atau <a href="https://t.me/pksdigischool" target="_blank"><u>admin telegram</u></a></i><br>
        <span>
            <!---->
        </span>
    </div>
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
                        <div id="collapse{{$loop->iteration}}" role="tabpanel"
                            aria-labelledby="heading{{$loop->iteration}}" class="collapse show">
                            <div class="card-body">
                                @foreach ($tab->materi as $materi)
                                <ul class="list-group">
                                    <li class="list-group-item col">
                                        <span>
                                            <a href="{{ route('admin.kelas.materi.show', [$kelass->slug, $materi->slug]) }}"
                                                target="_blank">
                                                <u>{{ $materi->judul }}</u>
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                                @endforeach
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