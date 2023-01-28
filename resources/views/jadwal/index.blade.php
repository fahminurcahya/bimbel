@extends('layouts.template')

@section('title')
Jadwal TryOut
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">

        @if(Request::get('keyword'))
            <a class="btn btn-success" href="{{ route('jadwal.index') }}">Back</a>
        @else
            <a class="btn btn-success" href="{{ route('jadwal.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
        @endif

        <form method="get" action="{{route('jadwal.index')}}">
            <div class="form-group">
              <label for="keyword" class="col-sm-2 control-label">Search</label>
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
            @include('alert.success')
            @include('alert.error')
            <table class="table table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th>Nama Tes</th>
                    <th>Nilai Maksimal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Created At</th>
                    <th width="30%">Action</th>
                </thead>
                <tbody>
                    @foreach ($jadwal as $row)
                        <tr>
                            <td>{{$loop->iteration + ($jadwal->perpage() * ($jadwal->currentPage()-1))}}</td>
                            <td>{{$row->nama_to}}</td>
                            <td>{{$row->skor_maksimal}}</td>
                            <td>{{$row->waktu_mulai}}</td>
                            <td>{{$row->waktu_akhir}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>
                                <form method="post" action="{{ route('jadwal.destroy',[$row->id_to]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf{{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('jadwal.edit',[$row->id_to]) }}">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <a class="btn btn-info" href="{{ route('jadwal.show',[$row->id_to]) }}">Pilih Modul Soal</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jadwal->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
