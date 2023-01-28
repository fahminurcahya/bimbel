@extends('layouts.template')

@section('title')
Detail Kelas
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('alert.error')
                @include('alert.success')
                <h3 class="box-title aaaa"><i class="fa fa-address-card" aria-hidden="true"></i> Data Siswa</h3>
                <div class="pull-right">
                </div>
            </div>
            <div class="box-body">
                <div class="clearfix"></div>
                <table class="table table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                        </tr>
                        </thead>
                <tbody>
                    <input type="hidden" id="id_kelas" value="{{ $id_kelas }}">
                    @if($siswa->count())
                        @php
                            $i = 1;
                        @endphp
                        @foreach($siswa as $data_siswa)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $data_siswa->nama }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td>Belum ada siswa</td>
                        </tr>
                    @endif
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Detail</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td>{{ $kelas->nama }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>

</script>
@endpush
