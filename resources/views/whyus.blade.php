
@extends('layouts.front')

@section('title')
Why Us
@endsection

@section('content')

    <section id="features" class="features section-bg" style="margin-top: 150px; padding-bottom:100px; ">
        <div class="container">

            <div class="section-title" style="margin-bottom:100px;">
                <h2 data-aos="fade-in" style="text-align: center">Why Us</h2>
            </div>

            @foreach($whyus as $row => $data)
                @if ($row == 0 || $row % 2 == 0)
                    <div class="row content">
                        <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{asset('uploads/'.$data->gambar)}}" alt="img" width="400px" class="img-fluid" >
                        </div>
                        <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                        <h3>{{$data->deskripsi}}</h3>
                        </div>
                    </div>
                @else
                    <div class="row content">
                        <div class="col-md-5" data-aos="fade-right">
                        <img src="{{asset('uploads/'.$data->gambar)}}" alt="img" width="400px" class="img-fluid" >
                        </div>
                        <div class="col-md-7 pt-5" data-aos="fade-left">
                        <h3>{{$data->deskripsi}}</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    @endsection

   @push('scripts')
   <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
   <script src="{{ asset('front/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
   <script src="{{ asset('front/js/main.js') }}"></script>
    @endpush

