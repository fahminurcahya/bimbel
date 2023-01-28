@extends('layouts.tryout')

@section('title')
Try Out
@endsection
@push('styles')
    <style>
        label {display: block; padding: 5px; position: relative; }
        label input {display: none;}
        label p {
            padding-left:10px ;
        }
        label span {border: 1px solid #ccc; width: 20px; height: 20px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 13pt; left: 0; top: 20%; margin-top: ;}
        input:checked + span {background: rgb(153, 153, 184); border-color: rgb(184, 184, 226);}
    </style>
@endpush

@section('content')
<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tes : {{$data['nama_to']}}
        </h1>
    </section>

	<!-- Main content -->
    <section class="content">
    	<div class="row">
            <div class="col-sm-8">
                <form id="form-kerjakan" >
                    <input type="hidden" name="tes-id" id="tes-id" value="{{$data['id_to']}}">
                    <input type="hidden" name="tes-user-id" id="tes-user-id" value="{{$data['id_ssc_user']}}">
                    <input type="hidden" name="tes-soal-id" id="tes-soal-id" value="{{$data['id_ssc_soal']}}">
                    <input type="hidden" name="tes-soal-nomor" id="tes-soal-nomor"  value="{{$data['tes_soal_nomor']}}">
                    <input type="hidden" name="tes-soal-jml" id="tes-soal-jml" value="{{$data['tes_soal_jml']}}">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Soal <span id="judul-soal">ke {{$data['tes_soal_nomor']}}</span></h3>
                            <div class="box-tools pull-right">
                                <div class="pull-right">
                                    <div id="sisa-waktu"></div>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div id="isi-tes-soal" style="font-size: 15px;">
                                {!!$data['tes_soal']!!}
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default hide" id="btn-sebelumnya">Soal Sebelumnya</button>&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-default" id="btn-selanjutnya">Soal Selanjutnya</button>
                        </div>
                    </div><!-- /.box -->
                </form>
            </div>

            <div class="col-sm-4">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Soal</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!!$data['tes_daftar_soal']!!}
                        <p class="help-block">Soal yang sudah dijawab akan berwarna Biru.</p>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-default pull-right" id="btn-hentikan">Hentikan Tes</button>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->

    <div class="modal" style="max-height: 100%;overflow-y: auto;" id="modal-hentikan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <form class="form-horizontal" method="post" action="{{ route('hentikan-to') }}">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Konfirmasi Hentikan Tes</div>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                            <div id="form-pesan"></div>
                            <div class="callout callout-info">
                                <p>Apakah anda yakin mengakhiri mata uji ini ?
                                    <br />Jawaban Tes yang sudah selesai tidak dapat diubah.
                                </p>

                            </div>
                            <input type="hidden" name="hentikan-tes-id" id="hentikan-tes-id">
                            <input type="hidden" name="hentikan-tes-user-id" id="hentikan-tes-user-id">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Tes</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="hentikan-tes-nama" name="hentikan-tes-nama" readonly>
                                    </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan Soal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="hentikan-dijawab" name="hentikan-dijawab" readonly>
                                    </div>
                                  </div>
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Hentikan Tes</button>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>

        </form>
    </div>

    <div class="modal" id="modal-proses" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div style="text-align: center;">
                <img width="50" src="{{ asset('img/loading.gif') }}"> <br />Data Sedang diproses...
              </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</div><!-- /.container -->


@endsection

@push('scripts')
<script>
    var sisa_detik = {{$data['detik_sisa']}}
    setInterval(function() {

        y     = sisa_detik % 3600;
        jam   = sisa_detik / 3600;
        menit = y / 60;
        detik = y % 60;

        var waktu = Math.floor(jam) + ' Jam ' + Math.floor(menit) + ' Menit ' + Math.floor(detik) + ' Detik ';
        var sisa_menit = Math.round(sisa_detik / 60);
        sisa_detik = sisa_detik - 1;
        $("#sisa-waktu").html("Sisa Waktu : " + waktu);

        if (sisa_detik < 1) {
            window.location.reload();
        }
    }, 1000);
</script>
<script>
      function soal(id_ssc_soal) {
        $("#modal-proses").modal('show');
        let api = "{{$data['url']}}/api/get_soal"


        $.ajax({
            url: api,
            type: "POST",
            cache: false,
            timeout: 10000,
            data: {
                id_ssc_soal: id_ssc_soal,
			    id_ssc_user : $('#tes-user-id').val()
            } ,
            success: function(respon) {
                var data = respon[0];
                $("#modal-proses").modal('hide');
                if (data.data == 1) {
                    $('#tes-soal-id').val(data.id_ssc_soal);
                    $('#tes-soal-nomor').val(data.tes_soal_nomor);
                    $('#isi-tes-soal').html(data.tes_soal);
                    $('#judul-soal').html('ke ' + data.tes_soal_nomor);



                    // menghilangkan tombol sebelum jika soal di nomor1
                    // dan menghilangkan tombol selanjutnya jika disoal terakhir
                    var tes_soal_nomor = parseInt($('#tes-soal-nomor').val());
                    var tes_soal_jml = parseInt($('#tes-soal-jml').val());
                    var tes_soal_tujuan = data.tes_soal_nomor;
                    if (tes_soal_tujuan == 1) {
                        $('#btn-sebelumnya').addClass('hide');
                        $('#btn-selanjutnya').removeClass('hide');
                    } else if (tes_soal_tujuan == tes_soal_jml) {
                        $('#btn-sebelumnya').removeClass('hide');
                        $('#btn-selanjutnya').addClass('hide');
                    } else {
                        $('#btn-sebelumnya').removeClass('hide');
                        $('#btn-selanjutnya').removeClass('hide');
                    }

                } else if (data.data == 2) {
                    window.location.reload();
                }
                // $("#modal-proses").modal('hide');
            },
            error: function(xmlhttprequest, textstatus, message) {

            }
        });

    }

    function jawab() {
        $("#modal-proses").modal('show');
        let api = "{{$data['url']}}/api/jawab_soal"
        $.ajax({
            url: api,
            type: "POST",
            cache: false,
            timeout: 10000,
            data: $("#form-kerjakan").serialize(),
                success: function(respon) {
                    var obj = respon;
                    if (obj.status == 1) {
                        $("#modal-proses").modal('hide');
                        notify_success(obj.pesan)
                        $('#btn-soal-' + obj.nomor_soal).removeClass('btn-default');
                        $('#btn-soal-' + obj.nomor_soal).addClass('btn-primary');
                    } else if (obj.status == 2) {
                        $("#modal-proses").modal('hide');
                        notify_error(obj.pesan)
                        alert(obj.pesan)
                        window.location.reload();
                    } else {
                        $("#modal-proses").modal('hide');
                        notify_error(obj.pesan);
                    }
                },
                error: function(xmlhttprequest, textstatus, message) {
                    if (textstatus === "timeout") {
                        $("#modal-proses").modal('hide');
                        notify_error("Gagal menyimpan jawaban, Silahkan Refresh Halaman");
                    } else {
                        $("#modal-proses").modal('hide');
                        notify_error(textstatus);
                    }
                }
        });

    }

    $('#btn-sebelumnya').click(function() {
            soal_navigasi(-1);
        });

        $('#btn-selanjutnya').click(function() {
            soal_navigasi(1);
        });


    function soal_navigasi(navigasi) {
        var tes_soal_nomor = parseInt($('#tes-soal-nomor').val());
        var tes_soal_jml = parseInt($('#tes-soal-jml').val());
        var tes_soal_tujuan = tes_soal_nomor + navigasi;

        if ((tes_soal_tujuan >= 1 && tes_soal_tujuan <= tes_soal_jml)) {
            $('#btn-soal-' + tes_soal_tujuan).trigger('click');
        }
    }

    $('#btn-hentikan').click(function() {
            hentikan_tes();
        });

    function hentikan_tes() {
        $('#hentikan-centang').prop("checked", false);
        $.getJSON('{{$data['url']}}/api/get_tes_info/' + $('#tes-user-id').val(), function(data) {
            if (data[0].data == 1) {
                $('#hentikan-tes-id').val(data[0].tes_id);
                $('#hentikan-tes-user-id').val(data[0].tes_user_id);
                $('#hentikan-tes-nama').val(data[0].tes_nama);
                $('#hentikan-dijawab').val(data[0].tes_dijawab + " dijawab. " + data[0].tes_blum_dijawab + " belum dijawab.");
                $('#hentikan-belum-dijawab').val(data[0].tes_blum_dijawab);


                $("#modal-hentikan").modal('show');
            } else {
                window.location.reload();
            }
        });
    }

    const pageAccessedByReload = (
    (window.performance.navigation && window.performance.navigation.type === 1) ||
        window.performance
        .getEntriesByType('navigation')
        .map((nav) => nav.type)
        .includes('reload')
    );

    if (pageAccessedByReload) {
        window.location.href = "{{$data['url']}}/tryout-main";
    }

</script>

@endpush
