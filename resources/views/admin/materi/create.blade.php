@extends('layouts.backend.app',[
'title' => 'Tambah Materi',
'contentTitle' => 'Tambah Materi'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content')

<div class="">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Box Materi</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.materi.store') }}">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Materi</label>
                    <input required="" type="" name="judul" placeholder="" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="file" class="dropify form-control" data-height="190"
                                data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select required="" class="form-control" name="kategori_materi_id">
                                <option selected="" disabled="">- PILIH KATEGORI -</option>
                                @foreach($kategoriMateri as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tersedia">Tersedia</label>
                            <input type='text' class="form-control" id='tersedia' name="tersedia"
                                placeholder="2023/06/14 16:35" />
                        </div>
                        @push('js')
                        <script type="text/javascript">
                            $(function () {
                                $('#tersedia').datetimepicker();
                            });
                        </script>
                        @endpush
                    </div>
                </div>
                <div id="form-group">
                    <label for="deskripsi">Isi Materi</label>
                    <textarea required="" name="deskripsi" id="deskripsi"
                        class="text-dark form-control summernote"></textarea>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">UPLOAD</button>
        </div>
        </form>
    </div>
</div>

@stop

@push('js')
<script type="text/javascript" src="{{ asset('plugins/summernote') }}/summernote-bs4.min.js"></script>
<script type="text/javascript" src="{{ asset('plugins/dropify') }}/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(".summernote").summernote({
        height:500,
        callbacks: {
        // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
        }
    })

    $(".summernote").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });

    $('.dropify').dropify({
        messages: {
            default: 'Drag atau Drop untuk memilih gambar',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });

    $('.title').keyup(function(){
        var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g,'-');
        $('.slug').val(title);
    });
</script>
@endpush