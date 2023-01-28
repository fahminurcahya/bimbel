@extends('layouts.template')

@section('title')
Data Produk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

            @if(Request::get('keyword'))
                <a class="btn btn-success" href="{{ route('produk.index') }}">Back</a>
            @else
                <a class="btn btn-success" href="{{ route('produk.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
            @endif

            <form method="get" action="{{route('produk.index')}}">
                <div class="form-group">
                  <label for="keyword" class="col-sm-2 control-label">Search By Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                  </div>
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="box-body">
                @if(Request::get('keyword'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif

                @include('alert.success')
                <table class="table table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th width="30%">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($produk as $row)
                            <tr>
                                <td>{{$loop->iteration + ($produk->perpage() * ($produk->currentPage()-1))}}</td>
                                <td>{{$row->nama}}</td>
                                <td>
                                    <form method="post" action="{{ route('produk.destroy',[$row->id_produk]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                        @csrf{{ method_field('DELETE') }}
                                        <a class="btn btn-warning" href="{{ route('produk.edit',[$row->id_produk]) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a class="btn btn-info" href="{{ route('produk.show',[$row->id_produk]) }}">Detail</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produk->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
