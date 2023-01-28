@extends('layouts.template')

@section('title')
Profile
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.success')
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('profil.update',[$profil->id_profil]) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">

                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $profil->nama }}">
                  </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profil->alamat }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_tlp" class="col-sm-2 control-label">No Telpon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ $profil->no_tlp }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="{{ $profil->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$profil->logo) }}" width="100px;"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">logo</label>
                    <div class="col-sm-10">
                        <input type="file" id="logo" name="logo" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="logo_filosofi" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$profil->logo_filosofi) }}" width="100px;"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="logo_filosofi" class="col-sm-2 control-label">Logo Filosofi</label>
                    <div class="col-sm-10">
                        <input type="file" id="logo_filosofi" name="logo_filosofi" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sejarah" class="col-sm-2 control-label">Sejarah</label>
                    <div class="col-sm-10">
                        <textarea id="sejarah" name="sejarah" rows="10" cols="80">
                            {{$profil->sejarah}}
                        </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="filosofi" class="col-sm-2 control-label">Filosofi</label>
                    <div class="col-sm-10">
                        <textarea id="filosofi" name="filosofi" rows="10" cols="80">
                            {{$profil->filosofi}}
                        </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="visi" class="col-sm-2 control-label">Visi</label>
                    <div class="col-sm-10">
                        <textarea id="visi" name="visi" rows="10" cols="80">
                            {{$profil->visi}}
                        </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="misi" class="col-sm-2 control-label">Misi</label>
                    <div class="col-sm-10">
                        <textarea id="misi" name="misi" rows="10" cols="80">
                            {{$profil->misi}}
                        </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="footer" class="col-sm-2 control-label">Footer</label>
                    <div class="col-sm-10">
                        <textarea id="footer" name="footer" rows="10" cols="80">
                            {{$profil->footer}}
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
      CKEDITOR.replace('sejarah')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('filosofi')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('visi')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('misi')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('footer')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>

@endpush
