@extends('layouts.template')

@section('title')
Evaluasi
@endsection

@section('content')
  <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Filter Jawaban</div>
                </div><!-- /.box-header -->
                <div class="box-body form-horizontal">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label for="jadwal" class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="jadwal" id="jadwal" placeholder="Jadwal" onchange="getJadwal()">
                                <option value ="">Pilih Jadwal</option>
                                @forelse($lovjadwal as $lovjadwal)
                                  <option value="{{  $lovjadwal->id_to }}">{{  $lovjadwal->nama_to }}</option>
                                @empty
                                @endforelse
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="box-title">Daftar Jawaban</div>
				</div><!-- /.box-header -->

                <div class="box-body">
                    <input type="hidden" name="edit-pilihan" id="edit-pilihan">
					<table id="table-jawaban" class="table table-bordered">
						<thead>
                            <tr>
                                <th>No.</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
					</table>
				</div>
			</div>
        </div>
    </div>

    <div class="modal" id="modal-evaluasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <form class="form-horizontal" method="post" id="form-nilai" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                        <div id="trx-judul">Evaluasi Jawaban</div>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="box-body">
                                <div id="form-pesan-evaluasi"></div>
                                <div class="form-group">
                                    <label>Nilai</label>
                                    <input type="hidden" id="evaluasi-testlog-id" name="evaluasi-testlog-id" >
                                    <input type="hidden" id="evaluasi-nilai-min" name="evaluasi-nilai-min" >
                                    <input type="hidden" id="evaluasi-nilai-max" name="evaluasi-nilai-max" >
                                    <input type="text" class="form-control" id="evaluasi-nilai" name="evaluasi-nilai" >
                                    <p class="help-block">Nilai dari jawaban yang diberikan</p>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Minimal adalah <span id="nilai-min"></span></label>
                                    <br />
                                    <label>Nilai Maximal adalah <span id="nilai-max"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="kirimNilai()" id="btn-nilai-simpan" class="btn btn-primary">Simpan</button>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
    $('#table-jawaban').DataTable( {
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "processing": true,
        "ajax":{
            url :"{{$url}}/api/getJawaban", // json datasource
            type: "post",
            data: {
			    jadwal : $('#jadwal').val()
            },
            error:function(result){
            }
        },
        "columns": [
            { "data": "id_ssc_user" },
            { "data": "soal_detail" },
            { "data": "ssc_jawaban_text" },
            { "render": function(data, type, row, meta){
                if(type === 'display'){
                    data = '<button class="btn btn-primary" style="font-size: 14px; padding: 2px; padding-left:5px; padding-right:5px; margin: 0px" onclick="evaluasi('+row["id_ssc_soal"]+','+row["skor_benar"]+','+row["skor_salah"]+')" data-toggle="modal">Evaluasi</a>';
                } else {
                    data = ''
                }

                return data;
                }
            }
        ]
    } );
} );

function getJadwal() {
    $('#table-jawaban').DataTable( {
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "processing": true,
        "destroy": true,
        "ajax":{
            url :"{{$url}}/api/getJawaban", // json datasource
            type: "post",
            data: {
			    jadwal : $('#jadwal').val()
            },
            error:function(result){
            }
        },
        "columns": [
            { "data": "id_ssc_user" },
            { "data": "soal_detail" },
            { "data": "ssc_jawaban_text" },
            { "render": function(data, type, row, meta){
                if(type === 'display'){
                    data = '<button class="btn btn-primary" style="font-size: 14px; padding: 2px; padding-left:5px; padding-right:5px; margin: 0px" onclick="evaluasi('+row["id_ssc_soal"]+','+row["skor_benar"]+','+row["skor_salah"]+')" data-toggle="modal">Evaluasi</a>';
                } else {
                    data = ''
                }

                return data;
                }
            }
        ]
    } );
}


function evaluasi(id, nilai_max, nilai_min){
        $("#modal-proses").modal('show');

        $("#nilai-min").html(nilai_min);
        $("#nilai-max").html(nilai_max);

        $("#evaluasi-testlog-id").val(id);
        $("#evaluasi-nilai").val('');
        $("#evaluasi-nilai-min").val(nilai_min);
        $("#evaluasi-nilai-max").val(nilai_max);

        $("#modal-evaluasi").modal("show");
        $("#evaluasi-nilai").focus();

        $("#modal-proses").modal('hide');
    }

    function kirimNilai(){
        if ($('#evaluasi-nilai').val() != '') {
            if(($('#evaluasi-nilai').val() >= $('#evaluasi-nilai-min').val()) && ($('#evaluasi-nilai').val() <= $('#evaluasi-nilai-max').val())) {
                $("#modal-proses").modal('show');
                $.ajax({
                    url: "{{$url}}/api/simpan_nilai",
                    type: "POST",
                    cache: false,
                    timeout: 10000,
                    data: $("#form-nilai").serialize(),
                        success: function(respon) {
                            var obj = respon;
                            if (obj.status == 1) {
                                $("#modal-proses").modal('hide');
                                $("#modal-evaluasi").modal('hide');
                                notify_success(obj.pesan)
                                getJadwal()
                            } else {
                                $("#modal-proses").modal('hide');
                                notify_error(obj.pesan)
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
            } else {
                notify_info('Nilai tidak boleh kurang atau lebih dari yang sudah ditentukan')
            }
        } else {
            notify_info('Nilai harus di isi')
        }

            return false;
    }
</script>

@endpush
