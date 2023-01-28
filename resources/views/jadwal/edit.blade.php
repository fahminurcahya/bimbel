@extends('layouts.template')

@section('title')
Edit Jadwal
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('jadwal.update',[$jadwal->id_to]) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="col-xs-6">
                <div id="form-pesan-tes"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Tes</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_to" value="{{ $jadwal->nama_to }}" id="nama_to" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea name="detail_to" id="detail_to" class="form-control input-sm" >{{ $jadwal->detail_to }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rentang Waktu</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" name="rentang-waktu" id="daterange" value="{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_akhir }}" class="form-control input-sm" readonly />
                            </div>
                            <p class="help-block">Rentang waktu tes dilaksanakan</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Waktu Tes</label>
                        <div class="col-sm-9">
                            <input type="text" name="durasi" id="durasi" class="form-control input-sm" value="{{ $jadwal->durasi }}" />
                            <p class="help-block">Waktu tes dalam satuan menit</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Poin Dasar</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_benar" id="skor_benar" class="form-control input-sm" value="{{ $jadwal->skor_benar }}" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jawaban Salah</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_salah" id="skor_salah" class="form-control input-sm" value="{{ $jadwal->skor_salah }}" disabled/>
                            <p class="help-block">Poin untuk jawaban salah</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jawaban Kosong</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_tidak_menjawab" id="skor_tidak_menjawab" class="form-control input-sm" value="{{ $jadwal->skor_tidak_menjawab }}" disabled/>
                            <p class="help-block">Poin untuk jawaban kosong</p>
                        </div>
                    </div>
                    @if(count($kelas)>0)
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="update_kelas" value="0" hidden>
                            <select class="form-control input-sm" id="tambah-group" name="kelas[]" size="8" multiple disabled>
                                @forelse($kelas as $kelas)
                                    <option value="{{  $kelas->id_kelas }}" readonly>{{  $kelas->nama }}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class="input-group-addon">
                                <a href="{{ route('group.delete',['id'=>$jadwal->id_to]) }}" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')"><i class="fa fa-trash" style="color: red"></i></a>
                            </div>
                            <p class="help-block">Hapus semua kelas jika ingin di rubah</p>
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="update_kelas" value="1" hidden>
                            <select class="form-control input-sm" id="tambah-group" name="kelas[]" size="8" multiple>
                                @forelse($lovkelas as $lovkelas)
                                    <option value="{{  $lovkelas->id_kelas }}">{{  $lovkelas->nama }}</option>
                                @empty
                                @endforelse
                            </select>
                            <p class="help-block">Silahkan pilih kelas</p>
                        </div>
                    </div>
                    @endif
                    {{-- <div class="form-group">
                        <label class="col-sm-3 control-label">Tunjukkan Hasil</label>
                        <div class="col-sm-9">
                            <select name="hasil_user" id="hasil_user" class="form-control" disabled>
                                <option value ="1" @if($jadwal->hasil_user == "1") Selected @endif>Ya</option>
                                <option value ="0" @if($jadwal->hasil_user == "0") Selected @endif>Tidak</option>
                              </select>
                            <p class="help-block">Menunjukkan hasil ke user saat tes sudah selesai</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Detail Hasil</label>
                        <div class="col-sm-9">
                            <select name="detail_user" id="detail_user" class="form-control" disabled>
                                <option value ="1" @if($jadwal->detail_user == "1") Selected @endif>Ya</option>
                                <option value ="0" @if($jadwal->detail_user == "0") Selected @endif>Tidak</option>
                              </select>
                            <p class="help-block">Menunjukkan detail jawaban ke user saat tes sudah selesai</p>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label class="col-sm-3 control-label">Token</label>
                        <div class="col-sm-9">
                            <select name="token_to" id="token_to" class="form-control" >
                                <option value ="1" @if($jadwal->token_to == "1") Selected @endif>Ya</option>
                                <option value ="0" @if($jadwal->token_to == "0") Selected @endif>Tidak</option>
                              </select>
                            <p class="help-block">Saat awal tes, user memasukkan Token dari operator</p>
                        </div>
                    </div> --}}
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection

@push('scripts')
<script>
   $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
        $('#daterange').daterangepicker({
            timePicker: true,
            timePickerIncrement: 10,
            locale: {
                format: 'YYYY-MM-DD H:mm'
            },
        });

    })

  </script>

@endpush
