@extends('layouts.template')

@section('title')
Edit Data Siswa
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('siswa.update',[$siswa->id_siswa]) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input readonly type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control datepicker" value="{{ $siswa->tanggal_lahir }}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Kelas">
                          <option value="L" @if($siswa->jenis_kelamin == 'L') Selected @endif>Laki-Laki</option>
                          <option value="P" @if($siswa->jenis_kelamin == 'P') Selected @endif>Perempuan</option>
                      </select>
                    </div>
                  </div>



                    <div class="form-group">
                      <label for="kota_lahir" class="col-sm-2 control-label">Kota Kelahiran</label>
                      <div class="col-sm-10">
                        <input type="text"  value="{{ $siswa->kota_lahir }}" class="form-control" id="kota_lahir" name="kota_lahir" placeholder="Kota Kelahiran">
                      </div>

                    </div>

                    <div class="form-group">
                      <label for="orang_tua" class="col-sm-2 control-label">Nama Orang Tua</label>
                      <div class="col-sm-10">
                        <input type="text"  value="{{ $siswa->orang_tua }}" class="form-control" id="orang_tua" name="orang_tua" placeholder="Nama Orang Tua">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat" class="col-sm-2 control-label">Alamat Tempat Tinggal</label>
                      <div class="col-sm-10">
                        <input type="text"  value="{{ $siswa->alamat }}" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_hp" class="col-sm-2 control-label">No HP Siswa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" value="{{ $siswa->no_hp }}" name="no_hp" placeholder="Nomor Hp Siswa">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_hp_ortu" class="col-sm-2 control-label">No HP Orang Tua</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp_ortu" value="{{ $siswa->no_hp_ortu }}" name="no_hp_ortu" placeholder="Nomor Hp Orang Tua">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="asal_sekolah" class="col-sm-2 control-label">Asal Sekolah</label>
                      <div class="col-sm-10">
                        <input type="text"  value="{{ $siswa->asal_sekolah }}" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah">
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="id_kelas" class="col-sm-2 control-label">Kelas yang di ambil</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="id_kelas" id="id_kelas" placeholder="Kelas">
                        @forelse($lovkelas as $lovkelas)
                          <option value="{{  $lovkelas->id_kelas }}" @if($siswa->id_kelas == $lovkelas->id_kelas) Selected @endif>{{  $lovkelas->nama }}</option>
                        @empty
                        @endforelse
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-10" hidden>
                    <input type="text" class="form-control"  name="id_user" value="{{ $siswa->id_user }}">
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
