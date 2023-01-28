@extends('layouts.template')

@section('title')
Data Guru
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <a href="{{ route('guru.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="box-body">

            <table class="table table-bordered">
                <tr style="text-align: center">
                    <td colspan="3"><img class="img-thumbnail" src="{{asset('uploads/'.$guru->gambar_guru)}}" alt="img" width="300px"></td>
                </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $guru->nama }}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $guru->ttl }}</td>
              </tr>
              <tr>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td>{{ $guru->pendidikan }}</td>
              </tr>
              <tr>
                <td>Pengalaman</td>
                <td>:</td>
                <td>{{ $guru->pengalaman }}</td>
              </tr>
              <tr>
                <td>Moto Hidup</td>
                <td>:</td>
                <td>{{ $guru->moto }}</td>
              </tr>
            </table>

            </div>
          </div>
        </div>
</div>
@endsection
