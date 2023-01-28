@extends('layouts.template')

@section('title')
Jawaban
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                Soal
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        {!! $soal->soal_detail !!}
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

                <form method="post" action="{{route('jawaban.create')}}">
                    @csrf
                    {{ method_field('GET') }}
                    <input type="text" name="id_soal" value="{{ $soal->id_soal }}" hidden>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</button>
                    <a class="btn btn-warning" href="{{ route('soal',['id'=>$soal->id_topik]) }}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>

                </form>

        </div>
        <div class="box-body">
            @include('alert.success')
            @include('alert.error')
            <table class="table table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th width="60%">Jawaban</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                    @foreach ($jawaban as $row)
                        <tr>
                            <td>{{$loop->iteration + ($jawaban->perpage() * ($jawaban->currentPage()-1))}}</td>
                            <td>{!!$row->jawaban_desc!!}</td>
                            @if($row->jawaban_benar =="1")
                            <td>Benar</td>
                            @else
                            <td>Salah</td>
                            @endif
                            <td>
                                <form method="post" action="{{ route('jawaban.destroy',[$row->id_jawaban]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf{{ method_field('DELETE') }}
                                    {{-- <a class="btn btn-warning" href="{{ route('jawaban.edit',[$row->id_jawaban]) }}">Edit</a> --}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jawaban->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
