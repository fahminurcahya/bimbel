@extends('layouts.template')

@section('title')
Tambah Jadwal TryOut
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('jadwal.store') }}">
              @csrf
              <div class="col-xs-6">
                <div id="form-pesan-tes"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Tes</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_to" value="{{ old('nama_to') }}" id="nama_to" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea name="detail_to" value="{{ old('detail_to') }}" id="detail_to" class="form-control input-sm" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rentang Waktu</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" name="rentang-waktu" id="daterange" class="form-control input-sm" readonly />
                            </div>
                            <p class="help-block">Rentang waktu tes dilaksanakan</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Waktu Tes</label>
                        <div class="col-sm-9">
                            <input type="text" name="durasi" id="durasi" class="form-control input-sm" value="30" />
                            <p class="help-block">Waktu tes dalam satuan menit</p>
                        </div>
                    </div>

                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Poin Dasar</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_benar" id="skor_benar" class="form-control input-sm" value="1.00" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jawaban Salah</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_salah" id="skor_salah" class="form-control input-sm" value="0.00" />
                            <p class="help-block">Poin untuk jawaban salah</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jawaban Kosong</label>
                        <div class="col-sm-9">
                            <input type="text" name="skor_tidak_menjawab" id="skor_tidak_menjawab" class="form-control input-sm" value="0.00" />
                            <p class="help-block">Poin untuk jawaban kosong</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm" id="tambah-group" name="kelas[]" size="8" multiple>
                                @forelse($kelas as $kelas)
                                    <option value="{{  $kelas->id_kelas }}">{{  $kelas->nama }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="col-sm-3 control-label">Token</label>
                        <div class="col-sm-9">
                            <select name="token_to" id="token_to" class="form-control" >
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                              </select>
                            <p class="help-block">Saat awal tes, user memasukkan Token dari operator</p>
                        </div>
                    </div> --}}
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
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
