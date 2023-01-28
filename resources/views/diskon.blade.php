@extends('layouts.front')

@section('title')
Discount
@endsection

@section('content')

    {{-- filosofi logo  --}}
    <section class="learning_part" style="padding-bottom: 100px; padding-top:200px;">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-12 col-lg-12" style="text-align: center; ">
                    <h1>Discount</h1>
                </div>
            </div>
                @foreach ($diskon as $row)
                <div class="row" style="margin-top: 100px" >
                <img src="{{asset('uploads/'.$row->gambar)}}" alt="img"  alt="" style="width: 400px; height:400px; display: block;
                margin-left: auto;
                margin-right: auto;">
                </div>
                <div class="row">
                <h4 style="display: block;
                margin-left: auto;
                margin-right: auto; margin-top:10px; font-size:20pt">{{$row->nama}}</h4>
                </div>
                @endforeach
        </div>
    </section>
    {{-- end filosofi logo  --}}

@endsection

