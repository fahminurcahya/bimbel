@extends('layouts.template')

@section('title')
Soal
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                Topik
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ $topik->nama }}" disabled>
                    </div>
                  </div>
            </div>
          </div>
        </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">

                <form method="post" action="{{route('soal.create')}}">
                    @csrf
                    {{ method_field('GET') }}
                    <input type="text" name="id_topik" value="{{ $topik->id_topik }}" hidden>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</button>
                    <a class="btn btn-warning" href="{{ route('topik.index') }}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>

                </form>

        </div>
        <div class="box-body">
            @include('alert.success')
            @include('alert.error')
            <table class="table table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th width="50%">Soal</th>
                    <th>Jenis Soal</th>
                    <th>Jawaban</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                    @foreach ($soal as $row)
                        <tr>
                            <td>{{$loop->iteration + ($soal->perpage() * ($soal->currentPage()-1))}}</td>
                            <td>{!!$row->soal_detail!!}</td>
                            @if($row->soal_tipe =="1")
                            <td>PG</td>
                            @else
                            <td>Essay</td>
                            @endif
                            <td>{{$row->jml_jawaban}}</td>
                            <td>
                                <form method="post" action="{{ route('soal.destroy',[$row->id_soal]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf{{ method_field('DELETE') }}
                                    {{-- <a class="btn btn-warning" href="{{ route('soal.edit',[$row->id_soal]) }}">Edit</a> --}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @if($row->soal_tipe =="1")
                                        <a class="btn btn-info" href="{{ route('jawaban',['id'=>$row->id_soal]) }}">Jawaban</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $soal->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
