@extends('layouts.template')

@section('title')
Edit Topik
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('topik.update',[$topik->id_topik]) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">


                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Topik/Mapel</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $topik->nama }}">
                  </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $topik->deskripsi }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">status</label>
                    <div class="col-sm-10">
                      <select name="is_aktif" id="status" class="form-control" disabled>
                        <option value="1" @if($topik->is_aktif == "1") Selected @endif >AKTIF</option>
                      </select>
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
