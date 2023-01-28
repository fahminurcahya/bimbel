@extends('layouts.template')

@section('title')
Data Mata Pelajaran
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <a href="{{ route('mapel.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="box-body">

            <table class="table table-bordered">
              <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td>{{ $mapel->nama }}</td>
              </tr>
            </table>
            </div>
          </div>
        </div>
</div>
@endsection
