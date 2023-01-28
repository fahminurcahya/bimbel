@extends('layouts.template')

@section('title')
Edit Discount
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('diskon.update',[$diskon->id_diskon]) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">


                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $diskon->nama }}">
                  </div>
                </div>


                  <div class="form-group">
                    <label for="gambar" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$diskon->gambar) }}" width="100px;"/>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" id="gambar" name="gambar" class="form-control"/>
                    </div>
                  </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
