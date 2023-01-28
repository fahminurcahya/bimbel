@extends('layouts.front2')
@push('styles')
<style>
  td {
  padding-bottom: 15px;
}
</style>
@endpush
@section('title')
Guru
@endsection

@section('content')
    {{-- header  --}}
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Profil Guru</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end header  --}}

    {{-- grid guru  --}}
    <section class="special_cource padding_top" style="padding-top: 50px">
        <div class="container">
            <div class="row">
                @foreach ($guru as $row)
                    <div class="col-sm-6 col-lg-4" style="margin-bottom: 50px;">
                        <div class="single_special_cource" style="text-align: center;" >
                            <div class="special_cource_text">
                                <img src="{{asset('uploads/'.$row->gambar_guru)}}" alt="img" class="special_img" alt="" style="width: 200px; height:200px">
                                <h3>{{$row->nama}}</h3>
                                <div class="author_info" style="text-align: left;">
                                    <table>
                                        <tr>
                                            <td><p>Tanggal Lahir</p></td>
                                            <td><p>&nbsp:&nbsp</p></td>
                                            <td><p>{{$row->ttl}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Pendidikan Terkhir</p></td>
                                            <td><p>&nbsp:&nbsp</p></td>
                                            <td><p>{{$row->pendidikan}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Pengalaman</p></td>
                                            <td><p>&nbsp:&nbsp</p></td>
                                            <td><p>{{$row->pengalaman}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Moto</p></td>
                                            <td><p>&nbsp:&nbsp</p></td>
                                            <td><p>{{$row->moto}}</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- end grid  --}}
@endsection

