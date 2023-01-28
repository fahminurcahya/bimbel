@extends('layouts.template')

@section('title')
Data Kelas
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

            @if(Request::get('keyword'))
                <a class="btn btn-warning" href="{{ route('kelas.index') }}">Back</a>
            @else
                <a class="btn btn-success" href="{{ route('kelas.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
            @endif

            <form method="get" action="{{route('kelas.index')}}">
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
                        @foreach ($kelas as $row)
                            <tr>
                                <td>{{$loop->iteration + ($kelas->perpage() * ($kelas->currentPage()-1))}}</td>
                                <td>{{$row->nama}}</td>
                                <td>
                                    <form method="post" action="{{ route('kelas.destroy',[$row->id_kelas]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                        @csrf{{ method_field('DELETE') }}
                                        <a class="btn btn-warning" href="{{ route('kelas.edit',[$row->id_kelas]) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a class="btn btn-info" href="{{ route('kelas.show',[$row->id_kelas]) }}">Detail</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kelas->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
