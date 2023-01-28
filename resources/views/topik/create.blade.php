@extends('layouts.template')

@section('title')
Tambah Topik
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('topik.store') }}">
              @csrf
              <div class="box-body">

                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Topik/Mapel</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Ex : Ipa">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label"  for="deskripsi">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Ex : Untuk kelas A">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="is_aktif" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                          <select name="is_aktif" id="is_aktif" class="form-control" disabled>
                            <option value="1">AKTIF</option>
                          </select>
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
