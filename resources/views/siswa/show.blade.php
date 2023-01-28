@extends('layouts.template')

@section('title')
Data Siswa
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <a href="{{ route('siswa.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="box-body">

            <table class="table table-bordered">
              <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $siswa->nama }}</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{ $siswa->username }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $siswa->email }}</td>
              </tr>
              <tr>
                <td>Level</td>
                <td>:</td>
                <td>{{ $siswa->level }}</td>
              </tr>
              <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $siswa->kota_lahir }} , {{ $siswa->tanggal_lahir }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                @if($siswa->jenis_kelamin =="L")
                    <td>Laki-Laki</td>
                @else
                    <td>Perempuan</td>
                @endif
              </tr>
              <tr>
                <td>Orang Tua</td>
                <td>:</td>
                <td>{{ $siswa->orang_tua }}</td>
              </tr>
              <tr>
                <td>No Hp Orang Tua</td>
                <td>:</td>
                <td>{{ $siswa->no_hp_ortu }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $siswa->alamat }}</td>
              </tr>
              <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $siswa->asal_sekolah }}</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $siswa->nama_kelas }}</td>
              </tr>
            </table>

            </div>
          </div>
        </div>
</div>
@endsection
