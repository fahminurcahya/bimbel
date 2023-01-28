@extends('layouts.front2')

@section('title')
Try Out
@endsection

@section('content')
  {{-- header  --}}
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Hasil Tryout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end header  --}}

<section class="special_cource padding_top" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            @foreach ($publish as $row)
                <div class="col-sm-12 col-lg-12" style="margin-bottom: 50px;">
                    <div class="single_special_cource" style="text-align: center;" >

                        <div class="special_cource_text">
                            <h3>{{$row->judul}}</h3>
                            <p>{{$row->created_at}}</p>
                            <hr>
                            <p style="text-align: center;">{!!$row->detail!!}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
