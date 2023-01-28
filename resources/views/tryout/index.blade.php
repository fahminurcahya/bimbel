
@extends('layouts.tryout')

@section('title')
Try Out
@endsection

@section('content')
<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		SELAMAT DATANG {{$siswa->nama}} || {{$siswa->nama_kelas}}
            <small>di Try Out Online Berbasis Komputer</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">dashboard</li>
        </ol>
	</section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Informasi</h4>
            <p>Silahkan pilih Tes yang diikuti dari daftar tes yang tersedia dibawah ini. Apabila tes tidak muncul, silahkan menghubungi Operator yang bertugas.</p>
        </div>
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Tes</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="table-tes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="all">Tes</th>
                            <th>Waktu Mulai Tes</th>
                            <th>Waktu Selesai Tes</th>
                            <th>Status</th>
                            <th class="all">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soal as $row)
                            <tr>
                                <td>{{$loop->iteration + ($soal->perpage() * ($soal->currentPage()-1))}}</td>
                                <td>{{$row->nama_to}}</td>
                                <td>{{$row->waktu_mulai}}</td>
                                <td>{{$row->waktu_akhir}}</td>
                                <td> </td>
                                @if ($row->mengerjakan == 1)
                                    <form method="post" action="{{ route('lanjutkan-to')}}">
                                        @csrf
                                        <input type="hidden" name="id_to" value="{{$row->id_to}}">
                                        <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
                                        <td><button type="submit" class="btn btn-info">Lanjutkan</button>
                                    </form>
                                @elseif ($row->mengerjakan == 0)
                                    <td><a class="btn btn-success" href="{{ route('tryout-main.show',[$row->id_to]) }}">Kerjakan</a>
                                @elseif ($row->mengerjakan == 3)
                                    <td><button class="btn btn-secondary" disabled> Belum bisa mengerjakan </button></td>
                                @else
                                    <td><button class="btn btn-secondary" disabled> Telah Dikerjakan </button></td>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div>
@endsection


