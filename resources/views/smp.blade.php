@extends('layouts.front2')
@push('styles')
<style>
       p {
        color: black
    }
    /* Pengaturan border-collapse jenis,ukuran serta warna huruf secara keseluruhan tabel */
    table{
        border-collapse:collapse;
        font:normal normal 12px Verdana,Arial,Sans-Serif;
        color:#333333;
        box-shadow: 10px 10px 5px grey;    }
    /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
    table th {
        background:#a8cf44;
        color:#DCDCDC;
        font-weight:bold;
        font-size:14px;
    }
    /* Mengatur border dan jarak/ruang pada kolom */
    table th,
    table td {
        vertical-align:top;
        padding:5px 10px;
        border:1px solid #696969;
    }
    /* Mengatur warna baris */
    table tr {
        background:#f4f5f3;
    }
    /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
    table tr:nth-child(even) {
        background:#f4f5f3;
    }
</style>
@endpush
@section('title')
Produk
@endsection

@section('content')
    {{-- header  --}}
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end header  --}}

    {{-- produk  --}}
    <section class="special_cource padding_top" style="padding-top: 50px; padding-bottom: 50px">
        <div class="container">
            <div class="col-sm-12">
            <div class="row">
                <table border="1" width="100%">
                    <tr>
                        @foreach ($produk as $row)
                            <th><p style="text-align: center">{{$row->nama}}</p></th>
                        @endforeach
                    </tr>
                        <tr>
                            @foreach ($produk as $row)
                            <td width="50%" style="text-align: left; padding-left:20px; padding-bottom:20px"><p>{!!$row->detail!!}</</td>
                            @endforeach
                        </tr>
                    </table>
            </div>
            </div>
        </div>
    </section>
    {{-- end   --}}
@endsection

