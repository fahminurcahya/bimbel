@extends('layouts.template')

@section('title')
Datail Hasil
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Informasi</div>
                    <div class="pull-right">
                        <a class="btn btn-warning" href="{{ route('hasil.index') }}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
                    </div>
                </div><!-- /.box-header -->

                <div class="box-body form-horizontal">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Tes</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="tes-user-id" id="tes-user-id" value="{{$data['ssc_user_id']}}">
                                <input type="text" name="tes-nama" id="tes-nama" class="form-control input-sm" value="{{$data['nama_to']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" name="user-nama" id="user-nama" class="form-control input-sm" value="{{$data['nama_siswa']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Waktu Mengerjakan</label>
                            <div class="col-sm-8">
                                <input type="text" name="tes-mulai" id="tes-mulai" class="form-control input-sm" value="{{$data['tes_mulai']}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nilai</label>
                            <div class="col-sm-8">
                                <input type="text" name="tes-nilai" id="tes-nilai" class="form-control input-sm" value="{{$data['nilai']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Benar</label>
                            <div class="col-sm-8">
                                <input type="text" name="tes-benar" id="tes-benar" class="form-control input-sm" value="{{$data['benar']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
    					<div class="box-title">Soal dan Jawaban</div>
                        <div class="box-tools pull-right">
                            {{-- <a href="#" onclick="refresh_table()">Refresh Detail Tes</span></a> --}}
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="table-soal" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tipe Soal</th>
                                    <th>Soal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#table-soal').DataTable( {
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "processing": true,
            "ajax":{
                url :"{{$url}}/api/getDetail", // json datasource
                type: "post",
                data: {
                    id_ssc_user : $('#tes-user-id').val(),
                },
                error:function(result){
                },
                // success:function(result){
                //     console.log(result)
                // }
            },
            "columns": [
                { "data": "id_ssc_soal" },
                { "render": function(data, type, row, meta){
                    if(type === 'display'){
                        if(row['soal_tipe'] == 1) {
                            data = 'Pilihan Ganda'
                        } else if (row['soal_tipe'] == 2) {
                            data = 'Essay'
                        }
                    } else {
                        data = ''
                    }

                    return data;
                    }
                },
                { "render": function(data, type, row, meta){
                    if(type === 'display'){
                        $jawaban_table = '<table class="table" border="0"><tr>'+
                                  '<td colspan="4">'+row['soal_detail']+'</td></tr>';
                        if(row['soal_tipe'] == 1) {
                            $jawaban_table = $jawaban_table +
	            			'<tr>'+
		                      	'<td width="5%"> </td>'+
		                      	'<td width="5%">Kunci</td>'+
		                      	'<td width="5%">Pilihan</td>'+
		                      	'<td width="85%">Jawaban</td>'+
		                    '</tr>';
                            row['jawaban'].forEach(function(jawaban, index) {
                                $temp_benar = '';
                                if(jawaban['jawaban_benar'] == "1"){
							        $temp_benar = '<b>&#10004;</b>';
						        }
						        $temp_pilihan = '';
                                if(jawaban['ssc_selected']==1){
                                    $temp_pilihan = '<b>&#10004;</b>';
                                }
                                $jawaban_table = $jawaban_table+
                                    '<tr>'+
                                        '<td width="5%"></td>'+
                                        '<td width="5%">'+$temp_benar+'</td>'+
                                        '<td width="5%">'+$temp_pilihan+'</td>'+
                                        '<td width="85%">'+jawaban['jawaban_desc']+'</td>'+
                                    '</tr>';

                            });
                            data = $jawaban_table+'</table>'

                        } else if (row['soal_tipe'] == 2) {
                            data = $jawaban_table +
	            			'<tr>'+
                            '<td width="5%">Skor</td>'+
                            '<td width="90%" colspan="2">Jawaban</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td width="5%"></td>'+
                                '<td width="5%">'+row['ssc_nilai']+'</td>'+
                                '<td width="90%" colspan="2"><div style="width:100%;"><pre style="white-space: pre-wrap;word-wrap: break-word;">'+row['ssc_jawaban_text']+'</pre></div></td>'+
                            '</tr></table>';
                        }
                    } else {
                        data = ''
                    }

                    return data;
                    }
                }
            ]
        });
    } );
</script>
@endpush
