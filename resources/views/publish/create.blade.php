@extends('layouts.template')

@section('title')
Publish
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('publish.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">

                    <div class="form-group">
                        <label for="judul" class="col-sm-2 control-label">Judul</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="detail" class="col-sm-2 control-label">Detail</label>
                        <div class="col-sm-10">
                            <textarea id="detail" name="detail" rows="10" cols="80">
                            </textarea>
                            </div>
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
      CKEDITOR.replace('detail', {
            filebrowserUploadUrl: "{{route('post.uploads', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
      $('.textarea').wysihtml5()
    })




  </script>

@endpush
