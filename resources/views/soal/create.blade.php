@extends('layouts.template')

@section('title')
Tambah Soal
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('soal.store') }}">
              @csrf
              <input type="text" name="id_topik" value="{{ $id_topik }}" hidden>
               <div class="form-group">
                    <label class="col-sm-2 control-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea id="soal_detail" name="soal_detail" rows="10" cols="80">
                        </textarea>
                            <p class="help-block">File gambar dapat di copy langsung atau di upload terlebih dahulu. File gambar yang didukung adalah jpg dan png.</p>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label class="col-sm-2 control-label">File Audio</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-sm" id="tambah-nama-audio" name="tambah-nama-audio" readonly>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" id="soal_audio" name="soal_audio" >
                        <p class="help-block">File audio yang akan ditambah pada soal. ( mp3). Jika ingin menghapus audio pada soal, maka Soalnya harus dihapus dahulu, setelah itu membuat soal ulang.</p>
                    </div>
                </div> --}}

                <div class="form-group">
                    {{-- <label class="col-sm-2 control-label">Putar Sekali</label>
                    <div class="col-sm-4">
                        <select class="form-control input-sm" id="soal_audio_play" name="soal_audio_play">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                        <p class="help-block">Memutar Audio sebanyak satu kali dalam satu Tes</p>
                    </div> --}}
                    <label class="col-sm-2 control-label">Tipe Soal</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="soal_tipe" name="soal_tipe">
                            <option value="1">Pilihan Ganda</option>
                            <option value="2">Esai</option>
                        </select>
                    </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('soal_detail', {
            filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
      $('.textarea').wysihtml5()
    })




  </script>

@endpush
