@extends('layouts.template')

@section('title')
Detail Jadwal
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('alert.error')
                @include('alert.success')
                <h3 class="box-title aaaa"><i class="fa fa-address-card" aria-hidden="true"></i> Topik</h3>

                    <div class="pull-right">
                        <a class="btn btn-warning" href="{{ route('jadwal.index') }}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
                        @if(!$set_topik->count())
                          <button type="button" class="btn btn-primary" id="btn-create"><i class="fa fa-edit"></i> Tambah Topik</button>
                        @endif

                    </div>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                      <form id="form-set" style="display: none; margin: 0 auto 20px;" class="form-horizontal well" method="POST" action="{{ route('jadwal.set') }}">
                        @csrf
                        <input type="hidden" id="id_to" name="id_to" value="{{ $id_to }}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Topik</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="id_topik" id="id_topik" placeholder="Topik">
                                    @forelse($lovtopik as $lovtopik)
                                      <option value="{{  $lovtopik->id_topik }}">{{  $lovtopik->nama }} || {{  $lovtopik->deskripsi }} [{{  $lovtopik->jml_soal }} Soal] </option>
                                    @empty
                                    @endforelse
                                  </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Tipe Soal</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="tipe" name="tipe">
                                    <option value="0">Pilihan Ganda</option>
                                    <option value="1">Pilihan Ganda</option>
                                    <option value="2">Essay</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Jumlah Soal</label>
                            <div class="col-sm-6">
                                <input type="text" name="jumlah_soal" id="jumlah_soal" class="form-control " val="{{$lovtopik->jml_soal}}" readonly />
                                <p class="help-block">jumlah soal yang akan diberikan</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jumlah Jawaban</label>
                            <div class="col-sm-6">
                                <input type="text" name="jumlah_jawaban" id="jumlah_jawaban" class="form-control " value="4" />
                                <p class="help-block">jumlah jawaban pilihan ganda</p>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Acak Soal</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="acak_soal" name="acak_soal">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Acak Jawaban</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="acak_jawaban" name="acak_jawaban">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                              <div class="alert alert-danger" id="notif" style="display: none; margin: 0 auto 10px"></div>
                              <button type="submit" class="btn btn-info pull-right" id="save">Simpan</button>
                            </div>
                          </div>
                      </form>
                    </div>
                </div>
                <div class="clearfix"></div>
                <table class="table table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Topik</th>
                            <th width="50">Action</th>
                        </tr>
                        </thead>
                <tbody>
                    @if($set_topik->count())
                        @foreach($set_topik as $set_topik)
                            <tr>
                                <td>{{ $set_topik->nama}},
                                    [{{ $set_topik->jumlah_soal}} Soal],
                                    [{{ $set_topik->jumlah_jawaban}} Pilihan Jawaban PG],
                                    {{-- [ @if($set_topik->tipe == '1') PG dan Essay @else Essay @endif], --}}
                                    Acak Soal : @if($set_topik->acak_soal == '1') Ya, @else Tidak, @endif
                                    Acak Jawaban : @if($set_topik->acak_jawaban == '1') Ya @else Tidak @endif</td>
                                <td align="center">
                                    <form method="post" action="{{ route('jadwal.setdelete',[$set_topik->id_set]) }}" onsubmit="return confirm('Apakah anda yakin akan mapel pada kelas ini ?')">
                                        @csrf{{ method_field('DELETE') }}
                                        <button type="submit"  style="background: transparent; border:hidden">
                                            <span data-toggle="tooltip" title="klik untuk menghapus topik dari jadwal ini"><i style="color: red; font-size: 16pt; cursor: pointer;" class="fa fa-minus-square-o"></i></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#btn-create').click(function() {
        $('#form-set').slideToggle();
    });
</script>
@endpush
