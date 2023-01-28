@extends('layouts.front')

@section('title')
Home
@endsection

@section('content')
    {{-- sejarah  --}}
    <section class="banner_part" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Sejarah perusahaan</h1>
                            {!!$profil->sejarah!!}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <img src="{{asset('front/img/banner_img.PNG')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end sejarah  --}}

    {{-- filosofi logo  --}}
    <section class="learning_part" style="padding-bottom: 100px; padding-top:100px;">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-12 col-lg-12" style="text-align: center; margin-bottom:50px;">
                    <h1>Filosofi Logo</h1>
                    <br>
                    <img src="{{asset('uploads/'.$profil->logo_filosofi)}}" alt="" width="500px" marb>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12" style="text-align: justify;">
                    {!!$profil->filosofi!!}

                </div>
            </div>
        </div>
    </section>
    {{-- end filosofi logo  --}}

    {{-- visi misi  --}}
    <section class="feature_part single_feature_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <h1 style="text-align: center;">Visi</h1>
                    <p style="text-align: justify;">
                        {!!$profil->visi!!}
                    </p>
                </div>
                <div class="col-sm-12 col-xl-6" style='color: #666666;
                font-family: "Roboto", sans-serif;
                line-height: 1.929;
                font-size: 14px;
                margin-bottom: 0px;
                color: #888888;'>
                    <h1 style="text-align: center;">Misi</h1>
                    <p style="text-align: justify;">
                        {!!$profil->misi!!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- end visi misi  --}}
@endsection

