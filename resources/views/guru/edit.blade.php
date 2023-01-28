@extends('layouts.template')

@section('title')
Edit Data Guru
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('guru.update',[$guru->id_guru]) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">


                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}">
                  </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="ttl" placeholder="Taggal Lahir" class="form-control datepicker"
                        value="{{$guru->ttl}}" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ $guru->pendidikan }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pengalaman" class="col-sm-2 control-label">Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ $guru->pengalaman }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="moto" class="col-sm-2 control-label">Moto Hidup</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="moto" name="moto" value="{{ $guru->moto}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gambar_guru" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$guru->gambar_guru) }}" width="100px;"/>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="gambar_guru" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" id="gambar_guru" name="gambar_guru" class="form-control"/>
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
