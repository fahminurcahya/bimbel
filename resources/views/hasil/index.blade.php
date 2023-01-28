@extends('layouts.template')

@section('title')
Hasil
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
                            <label for="jadwal" class="col-sm-2 control-label">Nama Test</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="jadwal" id="jadwal" placeholder="Jadwal">
                                <option value ="">Pilih Test</option>
                                @forelse($lovjadwal as $lovjadwal)
                                  <option value="{{  $lovjadwal->id_to }}">{{  $lovjadwal->nama_to }}</option>
                                @empty
                                @endforelse
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="kelas" id="kelas" placeholder="kelas">
                                <option value ="">Pilih Kelas</option>
                                @forelse($lovkelas as $lovkelas)
                                  <option value="{{  $lovkelas->id_kelas }}">{{  $lovkelas->nama }}</option>
                                @empty
                                @endforelse
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" id="btn-pilih" class="btn btn-primary pull-right"><span>Pilih</span></button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="box-title">Daftar Hasil Test</div>
				</div><!-- /.box-header -->

                <div class="box-body">
                    <input type="hidden" name="edit-pilihan" id="edit-pilihan">
					<table id="table-hasil" class="table table-bordered">
						<thead>
                            <tr>
                                <th>No.</th>
                                <th>Waktu Mulai Mengerjakan</th>
                                <th>Nama Test</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
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

@endsection
@push('scripts')
<script>
      $('#btn-pilih').click(function(){
           getHasil();
        });

     function getHasil(){
        $('#table-hasil').DataTable( {
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "processing": true,
        "destroy": true,
        "ajax":{
            url :"{{$url}}/api/getHasil", // json datasource
            type: "post",
            data: {
			    jadwal : $('#jadwal').val(),
                kelas : $('#kelas').val()
            },
            error:function(result){
            },

        },
        "columns": [
            { "data": "id_ssc_user" },
            { "data": "created_time" },
            { "data": "nama_to" },
            { "data": "mapel" },
            { "data": "nama_kelas" },
            { "render": function(data, type, row, meta){
                if(type === 'display'){
                    if(row['ssc_status'] > 0) {
                         data ="<a href='#' onClick = 'detailHasil("+row['id_ssc_user']+","+row['id_siswa']+")'>"+row['nama']+"</a>"
                    } else {
                        data = row['nama'];
                    }
                } else {
                    data = ''
                }

                return data;
                }
            },
            { "data": "nilai" },
            { "render": function(data, type, row, meta){
                if(type === 'display'){
                    if(row['ssc_status'] > 0) {
                       data = 'Sudah Mengerjakan'
                    } else {
                      data = 'Belum Mengerjakan'
                    }
                } else {
                    data = ''
                }

                return data;
                }
            }
        ]
        } );
     }


     function detailHasil(id_ssc_user, id_siswa) {
           // Simulate a mouse click:
        var url = "{{$url}}/detail-hasil";
            var form = $('<form action="' + url + '" method="post">' +
            '@csrf'+
            '<input type="text" name="id_ssc_user" value="' + id_ssc_user + '" />' +
            '<input type="text" name="id_siswa" value="' + id_siswa + '" />' +
            '</form>');
            $('body').append(form);
            form.submit();
     }
</script>

@endpush


