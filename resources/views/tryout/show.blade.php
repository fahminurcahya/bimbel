@extends('layouts.tryout')

@section('title')
Konfirmasi Tes
@endsection

@section('content')
<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Konfirmasi Tes
            <small>Silahkan periksa kembali data tes yang akan diikuti</small>
        </h1>
	</section>

	<!-- Main content -->
    <section class="content">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Konfirmasi Data Tes</h3>
            </div><!-- /.box-header -->
            <form class="form-horizontal" method="post" action="{{ route('start-to') }}">
            @csrf
            <div class="box-body">
                <div class="box-body no-padding">
                    <div id="form-pesan"></div>
                    <input type="hidden"  name="id_siswa" id="id_siswa" value="{{$siswa->id_siswa}}">
                    <input type="hidden"  name="id_to" id="id_to" value="{{$soal->id_to}}">
                    <table class="table table-striped">
                        <tr style="height: 45px;">
                            <td style="vertical-align: middle;text-align: right;">Nama Peserta : </td>
                            <td style="vertical-align: middle;"><b>{{$siswa->nama}}</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 45px;">
                            <td style="vertical-align: middle;text-align: right;">Tes : </td>
                            <td style="vertical-align: middle;"><b>{{$soal->nama_to}}</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 45px;">
                            <td style="vertical-align: middle;text-align: right;">Waktu : </td>
                            <td style="vertical-align: middle;">{{$soal->durasi}} Menit</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 45px;">
                            <td style="vertical-align: middle;text-align: right;">Poin Dasar : </td>
                            <td style="vertical-align: middle;">{{$soal->skor_benar}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 45px;">
                            <td style="vertical-align: middle;text-align: right;">Poin Maksimal : </td>
                            <td style="vertical-align: middle;">{{$soal->skor_maksimal}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                  </table>
            </div><!-- /.box-body -->
            <div class="box-body">
                <button type="submit" id="btn-tambah-simpan" class="btn btn-primary pull-right" >Kerjakan</button>
            </div>
        </div><!-- /.box -->
        </form>
    </section><!-- /.content -->
</div><!-- /.container -->
@endsection
