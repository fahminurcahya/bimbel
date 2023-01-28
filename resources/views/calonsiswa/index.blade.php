@extends('layouts.template')

@section('title')
Calon Siswa
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

            @if(Request::get('keyword'))
                <a class="btn btn-success" href="{{ route('pendaftar.index') }}">Back</a>
             @else
                <a class="btn btn-success" href="#"><span class="glyphicon glyphicon-file"></span> Export To Excel</a>

            @endif

            <form method="get" action="{{route('pendaftar.index')}}">
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
                        Hasil Pencarian Guru dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif

                @include('alert.success')
                <table class="table table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenjang</th>
                        <th>Tanggal Daftar</th>
                        <th width="30%">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($calonsiswa as $row)
                            @if($row->is_accept =="1")
                            <tr style="background-color: rgb(180, 245, 180)">
                                <td>{{$loop->iteration + ($calonsiswa->perpage() * ($calonsiswa->currentPage()-1))}}</td>
                                <td>{{$row->nama}}</td>
                                @if($row->jenis_kelamin =="L")
                                    <td>Laki-Laki</td>
                                @else
                                    <td>Perempuan</td>
                                @endif
                                <td>{{$row->nama_jenjang}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <form method="post" action="{{ route('pendaftar.destroy',[$row->id_daftar]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                        @csrf{{ method_field('DELETE') }}

                                        <a class="btn btn-info" href="{{ route('pendaftar.show',[$row->id_daftar]) }}">View</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>{{$loop->iteration + ($calonsiswa->perpage() * ($calonsiswa->currentPage()-1))}}</td>
                                <td>{{$row->nama}}</td>
                                @if($row->jenis_kelamin =="L")
                                    <td>Laki-Laki</td>
                                @else
                                    <td>Perempuan</td>
                                @endif
                                <td>{{$row->nama_jenjang}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <form method="post" action="{{ route('pendaftar.destroy',[$row->id_daftar]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                        @csrf{{ method_field('DELETE') }}
                                        <a class="btn btn-info" href="{{ route('pendaftar.show',[$row->id_daftar]) }}">View</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>
                {{ $calonsiswa->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
