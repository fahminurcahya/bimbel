@extends('layouts.template')

@section('title')
Tambah Data Produk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('produk.store') }}">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                  </div>
                </div>
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori" id="kategori" placeholder="Kategori">
                            <option value ="SD">SD</option>
                            <option value ="SMP">SMP</option>
                            <option value ="SMA">SMA</option>
                        </select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="detail" class="col-sm-2 control-label">Detail</label>
                    <div class="col-sm-10">
                        <textarea id="detail" name="detail" rows="10" cols="100">
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
      CKEDITOR.replace('detail')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
</script>
@endpush
