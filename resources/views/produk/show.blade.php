@extends('layouts.template')

@section('title')
Detail Produk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <a href="{{ route('produk.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="box-body">

            <table class="table table-bordered">
              <tr>
                <td>Nama Produk</td>
                <td>:</td>
                <td>{{ $produk->nama }}</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>{{ $produk->kategori }}</td>
              </tr>
              <tr>
                <td>Dateil</td>
                <td>:</td>
                <td>{!! $produk->detail !!}</td>
              </tr>
            </table>

            </div>
          </div>
        </div>
</div>
@endsection
