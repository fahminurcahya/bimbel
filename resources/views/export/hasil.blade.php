                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%" rowspan="3">No</th>
                            <th rowspan="3">Nama</th>
                            <th rowspan="3">Kelas</th>
                            <th colspan="{{$kelas->count() * 3}}" style="text-align: center">Nilai tryout</th>
                            <th rowspan="3">Rata-Rata</th>
                            <th rowspan="3">Nilai Total</th>
                        </tr>
                        <tr>
                            @foreach ($kelas as $row)
                            <th colspan="3">{{$row->nama}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($kelas as $row)
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>Nilai</th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @for ($i =0; $i < $getSiswa->count(); $i++)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$getSiswa[$i]->nama_siswa}}</td>
                                <td>{{$getSiswa[$i]->nama_kelas}}</td>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($kelas as $row)
                                    <td>{{$row->nilai_siswa[$i]->jawaban_benar}}</td>
                                    <td>{{$row->nilai_siswa[$i]->jawaban_salah}}</td>
                                    <td>{{$row->nilai_siswa[$i]->nilai}}</td>
                                    @php
                                    $total = $total+$row->nilai_siswa[$i]->nilai;
                                    @endphp
                                @endforeach
                                <td>{{$total / $kelas->count()}}</td>
                                <td>{{$total}}</td>
                            </tr>
                        @endfor

                    </tbody>
                </table>

