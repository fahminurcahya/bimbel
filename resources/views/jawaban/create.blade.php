@extends('layouts.template')

@section('title')
Tambah Jawaban
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('jawaban.store') }}">
              @csrf
              <input type="text" name="id_soal" value="{{ $id_soal }}" hidden>
               <div class="form-group">
                    <label class="col-sm-2 control-label">Jawaban</label>
                    <div class="col-sm-10">
                        <textarea id="jawaban_desc" name="jawaban_desc" rows="10" cols="80">
                        </textarea>
                            <p class="help-block">File gambar dapat di copy langsung atau di upload terlebih dahulu. File gambar yang didukung adalah jpg dan png.</p>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">Status Jawaban</label>
                    <div class="col-sm-4">
                        <select class="form-control input-sm" id="jawaban_benar" name="jawaban_benar">
                            <option value="0">Salah</option>
                            <option value="1">Benar</option>
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
      CKEDITOR.replace('jawaban_desc', {
            filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
      $('.textarea').wysihtml5()
    })




  </script>

@endpush
