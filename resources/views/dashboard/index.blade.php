@extends('layouts.template')

@section('title')
Dashboard
@endsection
@push('styles')
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#2E9AFE">
            <div class="inner">
                <h3>{{$nextujian}}</h3>
                <p>Try Out yang akan datang</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#DF0101">
            <div class="inner">
                <h3>{{$ujianberlangsung}}</h3>
                <p>Try Out yang sedang berlangsung</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            </div>
        </div>
    <!-- ./col -->

    @if(Auth::user()->level == "admin")
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box"  style="background-color:#01DF01">
            <div class="inner">
                <h3>{{$guru}}</h3>

                <p>Guru</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            </div>
        </div>
    <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#FFFF00">
            <div class="inner">
                <h3>{{$siswa}}</h3>

                <p>Siswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            </div>
        </div>
    <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #B45F04">
            <div class="inner">
                <h3>{{$pendaftar}}</h3>

                <p>Pendaftar Baru/hari ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            </div>
        </div>
    <!-- ./col -->
    </div>
    @endif

@endsection
