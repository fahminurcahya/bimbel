@extends('layouts.template')

@section('title')
Detail Pendaftar
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <a href="{{ route('pendaftar.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="box-body">

            <table class="table table-bordered">
              <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $pendaftar->nama }}</td>
              </tr>
              <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $pendaftar->kota_lahir }} , {{ $pendaftar->tanggal_lahir }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                @if($pendaftar->jenis_kelamin =="L")
                    <td>Laki-Laki</td>
                @else
                    <td>Perempuan</td>
                @endif
              </tr>
              <tr>
                <td>Orang Tua</td>
                <td>:</td>
                <td>{{ $pendaftar->orang_tua }}</td>
              </tr>
              <tr>
                <td>No Hp Orang Tua</td>
                <td>:</td>
                <td>{{ $pendaftar->no_hp_ortu }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pendaftar->alamat }}</td>
              </tr>
              <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $pendaftar->asal_sekolah }}</td>
              </tr>
              <tr>
                <td>Jenjang</td>
                <td>:</td>
                <td>{{ $pendaftar->nama_jenjang }}</td>
              </tr>
              <tr>
                <td>Info SSC</td>
                <td>:</td>
                <td>{{ $pendaftar->info_ssc }}</td>
              </tr>
              <tr>
                <td>Pembayaran</td>
                <td>:</td>
                <td>{{ $pendaftar->pembayaran }}</td>
              </tr>
            </table>
            </div>
          </div>
        </div>
</div>
@endsection
