@extends('layouts.template')

@section('title')
Why Us
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('setwhyus.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">

                    <div class="form-group">
                        <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
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
                <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
