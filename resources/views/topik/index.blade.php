@extends('layouts.template')

@section('title')
Topik/ Mapel
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

            @if(Request::get('keyword'))
                <a class="btn btn-warning" href="{{ route('topik.index') }}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
            @else
                <a class="btn btn-success" href="{{ route('topik.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
            @endif

            <form method="get" action="{{route('topik.index')}}">
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
                        Hasil Pencarian topik dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif

                @include('alert.success')
                @include('alert.error')
                <table class="table table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Topik/Mapel</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Soal</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th width="30%">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($topik as $row)
                            <tr>
                                <td>{{$loop->iteration + ($topik->perpage() * ($topik->currentPage()-1))}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->deskripsi}}</td>
                                <td>{{$row->jml_soal}}</td>
                                @if ($row->is_aktif == '1')
                                    <td>Aktif</td>
                                @endif
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <form method="post" action="{{ route('topik.destroy',[$row->id_topik]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                        @csrf{{ method_field('DELETE') }}
                                        <a class="btn btn-warning" href="{{ route('topik.edit',[$row->id_topik]) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a class="btn btn-info" href="{{ route('soal',['id'=>$row->id_topik]) }}">Soal</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $topik->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
