@extends('layouts.front')

@section('title')
Daftar
@endsection

@section('content')
<section class="learning_part" style="padding-bottom: 100px; padding-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @include('alert.error')
                </div>
                <div class="box-body">
                    <form id="daftar-form" method="post" action="{{ route('daftar.store') }}">
                        @csrf
                        <div class="form-group row">
                          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-10">
                            <input type="text" style="text-transform:uppercase" value="{{ old('nama') }}" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control datepicker" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                          </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" checked>
                                    <label class="form-check-label" for="laki">
                                      Laki-Laki
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" checked>
                                    <label class="form-check-label" for="perempuan">
                                      Perempuan
                                    </label>
                                  </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="kota_lahir" class="col-sm-2 col-form-label">Kota Kelahiran</label>
                            <div class="col-sm-10">
                              <input type="text"  value="{{ old('kota_lahir') }}" class="form-control" id="kota_lahir" name="kota_lahir" placeholder="Kota Kelahiran">
                            </div>

                          </div>

                          <div class="form-group row">
                            <label for="orang_tua" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-10">
                              <input type="text"  value="{{ old('orang_tua') }}" class="form-control" id="orang_tua" name="orang_tua" placeholder="Nama Orang Tua">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
                            <div class="col-sm-10">
                              <input type="text"  value="{{ old('alamat') }}" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">No HP Siswa</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="no_hp" value="{{ old('no_hp') }}" name="no_hp" placeholder="Nomor Hp Siswa">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="no_hp_ortu" class="col-sm-2 col-form-label">No HP Orang Tua</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="no_hp_ortu" value="{{ old('no_hp_ortu') }}" name="no_hp_ortu" placeholder="Nomor Hp Orang Tua">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-10">
                              <input type="text"  value="{{ old('asal_sekolah') }}" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="jenjang" class="col-sm-2 col-form-label">Jenjang Sekolah</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenjang" id="jenjang" placeholder="jenjang">
                                    @forelse($lovjenjang as $lovjenjang)
                                    <option value="{{  $lovjenjang->id_jenjang }}">{{  $lovjenjang->nama }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="info_ssc" class="col-sm-2 col-form-label">Info SSC Dari?</label>
                            <div class="col-sm-10">
                                <div class="form-check row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="info_ssc[]" type="checkbox" id="internet" value="Internet">
                                        <label class="form-check-label" for="internet">Internet</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="medsos" value="Media Sosial">
                                        <label class="form-check-label" for="medsos">Media Sosial</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="ortu" value="Orang Tua">
                                        <label class="form-check-label" for="ortu">Orang Tua</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="guru" value="Guru">
                                        <label class="form-check-label" for="guru">Guru</label>
                                      </div>

                                </div>
                                <div class="form-check row">

                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="brosur" value="Bosur">
                                        <label class="form-check-label" for="brosur">Brosur</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="teman" value="Teman">
                                        <label class="form-check-label" for="teman">Teman</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="karyawan" value="Karyawan">
                                        <label class="form-check-label" for="karyawan">Karyawan SSC</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="info_ssc[]" id="lainnya" value="Lainnya">
                                        <label class="form-check-label" for="lainnya">Lainnya</label>
                                      </div>
                                </div>

                            </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Pembayaran DP/Lunas</label>
                            <div class="col-sm-10">
                                <p style="font-style: italic">Merupakan DP awal yang bersedia dibayarkan setelah melakukan pendaftaran formulir. Belum termasuk biaya pendaftaran senilai RP 250.000,-</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="200" value="Rp.200.000,-" checked>
                                    <label class="form-check-label" for="200">
                                      Rp.200.000,-
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="500" value="Rp.500.000,-" checked>
                                    <label class="form-check-label" for="500">
                                        Rp.500.000,-
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="1000" value="Rp.1000.000,-" checked>
                                    <label class="form-check-label" for="1000">
                                        Rp.1000.000,-
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="lunas" value="Lunas" checked>
                                    <label class="form-check-label" for="lunas">
                                      Lunas
                                    </label>
                                  </div>
                            </div>
                            <div class="form-group">
                                <br><br>

                                    <h4>PERNYATAAN PERSETUJUAN</h4>
                                    <p style="color: black">Syarat dan ketentuan klik disini</p>
                            <p style="color: black">Dengan ini saya setuju dengan syarat dan ketentuan yang ada</p>
                                </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="toggleRadio(true)" name="pernyataan" id="setuju" value=true checked>
                                    <label class="form-check-label" for="setuju">
                                      Setuju
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="toggleRadio(false)" name="pernyataan" id="tidak_setuju" value=false checked>
                                    <label class="form-check-label" for="tidak_setuju">
                                        Tidak Setuju
                                    </label>
                                  </div>
                            </div>
                          </div>

                <!-- /.box-footer -->
                <div class="box-footer">
                    <button type="submit" id="button" name="tombol" class="btn btn-info pull-right">Daftar</button>
                  </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
document.getElementById('button').setAttribute("disabled", "true");

  function toggleRadio(flag){
      if(!flag) {
        document.getElementById('button').setAttribute("disabled", "true");
      } else {
        document.getElementById('button').removeAttribute("disabled");
      }

    }
</script>

@endpush


