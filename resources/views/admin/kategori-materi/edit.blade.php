@extends('layouts.backend.app',[
'title' => 'Edit Kategori Materi',
'contentTitle' => 'Edit Kategori Materi'
])
@section('content')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

<div class="">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <a href="{{ route('admin.kategori-materi.index') }}" class="btn btn-success btn-sm">Kembali</a>
            </h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.kategori-materi.update',$kategoriMateri->id) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="file" class="dropify form-control" data-height="190"
                                data-allowed-file-extensions="png jpg gif jpeg svg webp jfif"
                                value="{{ !empty($materi->thumbnail) ? '/uploads/img/materi/'.$materi->thumbnail : ''}}"
                                required>
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <label for="nama_kategori">Nama kategori</label>
                            <input value="{{ $kategoriMateri->nama_kategori }}" required="" type="" name="nama_kategori"
                                placeholder="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Deskripsi kategori</label>
                            <input value="{{ $kategoriMateri->deskripsi }}" required="" type="" name="deskripsi"
                                placeholder="" class="form-control">
                        </div>
                    </div>
                </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">UPDATE</button>
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