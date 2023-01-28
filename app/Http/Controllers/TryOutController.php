<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use App\Siswa;
use App\Group;
use App\Jadwal;
use App\Jawaban;
use App\Publish;
use App\Soal;
use App\TesJawaban;
use App\TesSoal;
use App\TesUser;
use App\TopikToJadwal;
use DateTime;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Row;
use Sabberworm\CSS\Value\Size;

class TryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::select('siswa.*', 'kelas.nama as nama_kelas')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->where('id_user', '=', Auth::user()->id)->get()->first();

        $waktu = strtotime(date('Y-m-d H:i:s'));
        $soal = Group::select('ssc_group.*', 'ssc_to.*')
            ->join('kelas', 'ssc_group.id_kelas', '=', 'kelas.id_kelas')
            ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_group.id_to')
            ->where('ssc_group.id_kelas', '=', $siswa->id_kelas)
            ->where('ssc_to.waktu_mulai', '<=', date('Y-m-d H:i:s'))
            ->where('ssc_to.waktu_akhir', '>=', date('Y-m-d H:i:s'))
            ->paginate(5);

        if ($soal->count() > 0) {
            foreach ($soal as $row) {

                $setTo = TopikToJadwal::where('ssc_topik_set.id_to', '=', $row['id_to'])->count();

                if ($setTo > 0) {
                    $tanggal = new DateTime();
                    $query_test_user = TesUser::where('id_siswa', '=', $siswa->id_siswa)
                        ->where('id_to', '=', $row['id_to'])
                        ->first();
                    if ($query_test_user) {
                        $tanggal_tes = new DateTime($query_test_user->created_time);
                        $tanggal_tes->modify('+' . $row['durasi'] . ' minutes');
                        if ($tanggal < $tanggal_tes and $query_test_user->ssc_status != 4) {
                            // nilai kosong karena masih dalam pengerjaan
                            $row['mengerjakan'] = 1;
                        } else {
                            $row['mengerjakan'] = 2;
                        }
                    } else {
                        $row['mengerjakan'] = 0;
                    }
                } else {
                    $row['mengerjakan'] = 3;
                }
            }
        }

        return view('tryout.index', compact('siswa', 'waktu', 'soal'));
    }

    public function front()
    {
        $publish = Publish::orderBy('created_at', 'DESC')->paginate(5);
        $profil = Profil::get()->first();
        return view('tryout', compact('profil', 'publish'));
    }

    public function login()
    {

        // $profil = Profil::get()->first();
        return view('auth/login_siswa');
    }

    public function do_login(Request $request)
    {
        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data) && Auth::user()->level == 'siswa') {
            return redirect('/tryout-main');
        } else if (Auth::attempt($user_data) && (Auth::user()->level == 'akademik' || Auth::user()->level == 'admin')) {
            return $this->do_logout($request);
        } else {
            return back()->withErrors('email dan password salah');
        }
    }

    public function do_logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/form-login');
    }

    protected function loggedOut(Request $request)
    {
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::select('siswa.*', 'kelas.nama as nama_kelas')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->where('id_user', '=', Auth::user()->id)->get()->first();
        $soal = Jadwal::findOrFail($id);
        $waktu = strtotime(date('Y-m-d H:i:s'));
        return view('tryout.show', compact('waktu', 'siswa', 'soal'));
    }

    public function lanjutkanTo(Request $request)
    {
        $ssc_user = TesUser::where('id_siswa', '=', $request->get('id_siswa'))
            ->where('id_to', '=', $request->get('id_to'))
            ->first();


        return $this->kerjakan($ssc_user['id_to'], $ssc_user['id_ssc_user']);
    }

    public function startTo(Request $request)
    {

        // cek jadwal
        $jadwal = Jadwal::findOrFail($request->get('id_to'));

        if ($jadwal) {
            // cek apakah sudah pernah mengerjakan?
            $ssc_user_count = TesUser::where('id_siswa', '=', $request->get('id_siswa'))
                ->where('id_to', '=', $request->get('id_to'))
                ->count();

            if ($ssc_user_count == 0) {
                // Mengecek apakah test mempunyai data soal
                // 1. Memasukkan data ke test_user
                $data_tes['id_siswa'] = $request->get('id_siswa');
                $data_tes['id_to'] = $request->get('id_to');
                $data_tes['ssc_status'] = 1;
                $data_tes['created_time'] = date('Y-m-d H:i:s');
                $test_user = TesUser::create($data_tes);

                $topik_set = TopikToJadwal::where('id_to', '=', $request->get('id_to'))->first();

                if ($topik_set->acak_soal == '1') {
                    $soal = Soal::where('id_topik', '=', $topik_set->id_topik)
                        ->inRandomOrder()
                        ->get();
                } else {
                    $soal = Soal::where('id_topik', '=', $topik_set->id_topik)->get();
                }
                $i_soal = 0;
                if ($soal->count() > 0) {
                    foreach ($soal as $soal) {
                        // Memasukkan data soal ke table tests_logs
                        $data_soal['id_ssc_user'] = $test_user->id_ssc_user;
                        $data_soal['id_soal'] = $soal->id_soal;
                        $data_soal['ssc_nilai'] = $jadwal->skor_tidak_menjawab;
                        $data_soal['ssc_creation_time'] = date('Y-m-d H:i:s');
                        $data_soal['ssc_order'] = ++$i_soal;

                        $insert_soal[] = $data_soal;
                    }
                    TesSoal::insert($insert_soal);

                    $tes_soal = TesSoal::select('ssc_soal.id_ssc_soal', 'ssc_soal.id_soal', 'soal.soal_tipe')
                        ->join('soal', 'soal.id_soal', '=', 'ssc_soal.id_soal')
                        ->where('ssc_soal.id_ssc_user', '=', $test_user->id_ssc_user)
                        ->where('soal.id_topik', '=', $topik_set->id_topik)
                        ->orderBy('ssc_soal.ssc_order')
                        ->get();

                    foreach ($tes_soal as $tes_soal) {
                        // Jika tipe soal pilihan ganda
                        if ($tes_soal->soal_tipe == 1) {
                            // Jika jawaban diacak
                            if ($topik_set->acak_jawaban == 1) {
                                // mendapatkan jawaban dari soal yang ada dengan diacak terlebih dahulu
                                $jawaban = Jawaban::where('id_soal', '=', $tes_soal->id_soal)
                                    ->inRandomOrder()
                                    ->get();
                                // Jika jumlah jawaban lebih dari 0
                                if ($jawaban->count() > 0) {
                                    $i_jawaban = 0;
                                    $insert_jawaban = array();
                                    foreach ($jawaban as $jawaban) {
                                        // Menyimpan data soal
                                        $data_jawaban['id_jawaban'] = $jawaban->id_jawaban;
                                        $data_jawaban['ssc_order'] = ++$i_jawaban;
                                        $data_jawaban['ssc_selected'] = 0;
                                        $data_jawaban['id_ssc_soal'] = $tes_soal->id_ssc_soal;

                                        $insert_jawaban[] = $data_jawaban;
                                    }
                                    //insert batch
                                    TesJawaban::insert($insert_jawaban);
                                }
                            } else {
                                // Mendapatkan jawaban yang tidak diacak
                                // mendapatkan jawaban dari soal yang ada dengan diacak terlebih dahulu
                                $jawaban = Jawaban::where('id_soal', '=', $tes_soal->id_soal)
                                    ->inRandomOrder()
                                    ->get();
                                // Jika jumlah jawaban lebih dari 0
                                if ($jawaban->count() > 0) {
                                    $i_jawaban = 0;
                                    $insert_jawaban = array();
                                    foreach ($jawaban as $jawaban) {
                                        // Menyimpan data soal
                                        $data_jawaban['id_jawaban'] = $jawaban->id_jawaban;
                                        $data_jawaban['ssc_order'] = ++$i_jawaban;
                                        $data_jawaban['ssc_selected'] = 0;
                                        $data_jawaban['id_ssc_soal'] = $tes_soal->id_ssc_soal;

                                        $insert_jawaban[] = $data_jawaban;
                                    }
                                    //insert batch
                                    TesJawaban::insert($insert_jawaban);
                                }
                            }
                        }
                    }
                }
                $status['id_ssc_user'] = $test_user->id_ssc_user;
                $status['id_to'] = $request->get('id_to');
                $status['pesan'] = 'Pembuatan tes untuk user berhasil';
                return $this->kerjakan($status['id_to'], $status['id_ssc_user']);
            } else {
                return redirect('tryout-main');
            }
        } else {
            return redirect('tryout-main');
        }
        // Mengambil data topik yang ada pada tes
    }

    public function getSoal(Request $request)
    {

        $id_ssc_soal = $request->id_ssc_soal;
        $id_ssc_user = $request->id_ssc_user;

        $data['data'] = 0;
        if (!empty($id_ssc_soal) and !empty($id_ssc_user)) {
            $data_soal = $this->get_soal($id_ssc_soal, $id_ssc_user);

            $data['data'] = $data_soal['data'];
            if (!empty($data_soal['tes_soal'])) {
                $data['tes_soal'] = $data_soal['tes_soal'];
                $data['id_ssc_soal'] = $data_soal['id_ssc_soal'];
                $data['tes_soal_nomor'] = $data_soal['ssc_soal_nomor'];
            }
        }
        return response()->json([
            $data
        ], 200);
    }

    public function kerjakan($id_to = null, $id_ssc_user = null)
    {
        $data['url'] = url('/');
        if (!empty($id_to)) {
            $siswa = Siswa::select('siswa.*', 'kelas.nama as nama_kelas')
                ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
                ->where('id_user', '=', Auth::user()->id)->get()->first();
            $waktu = strtotime(date('Y-m-d H:i:s'));

            //cek tes user apakah sudah membuka soal
            $query_tes = TesUser::select('ssc_user.id_ssc_user', 'ssc_user.created_time', 'ssc_to.*')
                ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_user.id_to')
                ->where('ssc_user.id_ssc_user', '=', $id_ssc_user)
                ->where('ssc_user.id_to', '=', $id_to)
                ->where('ssc_user.ssc_status', '=', '1')->first();



            if ($query_tes->count() > 0) {
                $tanggal = new DateTime();
                // Cek apakah tes sudah melebihi batas waktu
                $tanggal_tes = new DateTime($query_tes->created_time);
                $tanggal_tes->modify('+' . $query_tes->durasi . ' minutes');

                if ($tanggal >= $tanggal_tes) {
                    // jika waktu sudah melebihi waktu ketentuan, maka diarahkan ke dashboard
                    return redirect('tryout-main');
                } else {
                    // mengambil soal sesuai dengan tes yang dikerjakan
                    $data['id_to'] = $id_to;
                    $data['id_ssc_user'] = $query_tes->id_ssc_user;
                    $data['nama_to'] = $query_tes->nama_to;
                    $data['durasi'] = $query_tes->durasi;
                    $data['created_time'] = $query_tes->created_time;
                    $data['tanggal'] = $tanggal->format('Y-m-d H:i:s');

                    // Mengambil selisih jam
                    $tanggal_tes = new DateTime($query_tes->created_time);
                    $tanggal_diff = $tanggal_tes->diff($tanggal);

                    $detik_berjalan = ($tanggal_diff->h * 60 * 60) + ($tanggal_diff->i * 60) + $tanggal_diff->s;
                    $detik_total = $query_tes->durasi * 60;

                    // untuk menangani Jika tes setelah ditambah waktunya melebihi jam saat itu
                    // jika time saat ini lebih besar dari time creation
                    if ($tanggal >= $tanggal_tes) {
                        $detik_sisa = $detik_total - $detik_berjalan;

                        // jika time creation lebih besar dari tanggal saat ini
                    } else {
                        $detik_sisa = $detik_total + $detik_berjalan;
                    }

                    $data['detik_berjalan'] = $detik_berjalan;
                    $data['detik_total'] = $detik_total;
                    $data['detik_sisa'] = $detik_sisa;

                    // Mengambil menu daftar semua soal
                    $data_soal = $this->get_daftar_soal($id_to, $query_tes->id_ssc_user);

                    $data['tes_daftar_soal'] = $data_soal['tes_soal'];
                    $data['tes_soal_jml'] = $data_soal['tes_soal_jml'];

                    // Mengambil data soal ke 1
                    $tessoal = TesSoal::select('ssc_soal.*', 'soal.*')
                        ->join('soal', 'ssc_soal.id_soal', '=', 'soal.id_soal')
                        ->where('ssc_soal.id_ssc_user', '=', $query_tes->id_ssc_user)
                        ->orderBy('ssc_soal.ssc_order', 'ASC')
                        ->first();


                    $data_soal = $this->get_soal($tessoal->id_ssc_soal, $query_tes->id_ssc_user);
                    $data['tes_soal'] = $data_soal['tes_soal'];
                    $data['id_ssc_soal'] = $tessoal->id_ssc_soal;
                    $data['tes_soal_nomor'] = $tessoal->ssc_order;
                    // dd($data);

                    $waktu = strtotime(date('Y-m-d H:i:s'));
                    return view('tryout.kerjakan', compact('data', 'waktu'));
                }
            } else {
                redirect('tryout-main');
            }
        } else {
            redirect('tryout-main');
        }
    }


    private function get_daftar_soal($id_to = null, $id_ssc_user = null)
    {
        $data['tes_soal_jml'] = '';
        $data['tes_soal'] = '';
        $jml_soal = 0;
        $data_soal = '';
        if (!empty($id_to)) {

            $query_tes = TesUser::select('ssc_user.id_ssc_user', 'ssc_user.created_time', 'ssc_to.*')
                ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_user.id_to')
                ->where('ssc_user.id_ssc_user', '=', $id_ssc_user)
                ->where('ssc_user.id_to', '=', $id_to)
                ->where('ssc_user.ssc_status', '=', '1')
                ->first();

            if ($query_tes->count() > 0) {

                $query_soal = TesSoal::select('ssc_soal.*', 'soal.*')
                    ->join('soal', 'ssc_soal.id_soal', '=', 'soal.id_soal')
                    ->where('ssc_soal.id_ssc_user', '=', $query_tes->id_ssc_user)
                    ->orderBy('ssc_soal.ssc_order', 'ASC')
                    ->get();


                $jml_soal = $query_soal->count();

                if ($jml_soal > 0) {

                    foreach ($query_soal as $soal) {
                        // Jika jawaban sudah diisi
                        if (!empty($soal->ssc_change_time)) {
                            $data_soal = $data_soal . '<button id="btn-soal-' . $soal->ssc_order . '" onclick="soal(\'' . $soal->id_ssc_soal . '\')" class="btn btn-primary" style="margin-bottom: 5px;" title="Soal ke ' . $soal->ssc_order . '">' . $soal->ssc_order . '</button>

                                ';
                        } else {
                            $data_soal = $data_soal . '<button id="btn-soal-' . $soal->ssc_order . '" onclick="soal(\'' . $soal->id_ssc_soal . '\')" class="btn btn-default" style="margin-bottom: 5px;" title="Soal ke ' . $soal->ssc_order . '">' . $soal->ssc_order . '</button>

                                ';
                        }
                    }
                }
            }
        }
        $data['tes_soal_jml'] = $jml_soal;
        $data['tes_soal'] = $data_soal;
        return $data;
    }


    private function get_soal($id_ssc_soal = null, $id_ssc_user = null)
    {
        $data['id_ssc_soal'] = '';
        $data['tes_soal'] = '';
        $data['data'] = 0;
        if (!empty($id_ssc_soal) and !empty($id_ssc_user)) {
            // Mengecek apakah tes masih berjalan
            // mengambil tesuser_id terus mendapatkan datanya, dicek statusnya dan waktunya
            //if($this->cbt_tes_user_model->count_by_status_waktu($tesuser_id)->row()->hasil>0){
            //
            // revisi 2018-11-15
            // agar waktu mengambil dari waktu php, bukan mysql
            $waktuuser = date('Y-m-d H:i:s');

            $cektes = DB::select('select COUNT(u.id_ssc_user) AS hasil
                        from ssc_user u join ssc_to t on t.id_to = u.id_to
                        where (u.id_ssc_user="' . $id_ssc_user . '" AND u.ssc_status="1" AND TIMESTAMPADD(MINUTE, t.durasi, u.created_time)>"' . $waktuuser . '") LIMIT 1');



            if ($cektes[0]->hasil > 0) {
                $data['data'] = 1;


                $query_soal = TesSoal::select('ssc_soal.*', 'soal.*')
                    ->join('soal', 'ssc_soal.id_soal', '=', 'soal.id_soal')
                    ->findOrFail($id_ssc_soal);


                $soal = '';
                if ($query_soal) {
                    $data['id_ssc_soal'] = $id_ssc_soal;

                    // Mengupdate tessoal_display_time pada table test_log
                    $data_tes_soal['ssc_display_time'] = date('Y-m-d H:i:s');
                    $query_soal->update($data_tes_soal);

                    // mengganti [baseurl] ke alamat sesungguhnya
                    $soal = $query_soal->soal_detail;
                    $soal = str_replace("[base_url]", url('/'), $soal);
                    $soal = $soal . '<hr />';

                    $data['ssc_soal_nomor'] = $query_soal->ssc_order;

                    $soal = $soal . '<div class="form-group">';
                    if ($query_soal->soal_tipe == "1") {

                        $query_jawaban = TesJawaban::select('ssc_jawaban.*', 'jawaban.*')
                            ->join('jawaban', 'ssc_jawaban.id_jawaban', '=', 'jawaban.id_jawaban')
                            ->where('ssc_jawaban.id_ssc_soal', '=', $query_soal->id_ssc_soal)
                            ->orderBy('ssc_jawaban.ssc_order', 'ASC')
                            ->get();


                        if ($query_jawaban->count() > 0) {
                            $pg = 1;
                            foreach ($query_jawaban as $jawaban) {
                                // mengganti [baseurl] ke alamat sesungguhnya pada tag img / gambars
                                $temp_jawaban = $jawaban->jawaban_desc;
                                $temp_jawaban = str_replace("[base_url]", url('/'), $temp_jawaban);

                                $pgs = "";

                                if ($pg == 1) {
                                    $pgs = 'A';
                                } elseif ($pg == 2) {
                                    $pgs = 'B';
                                } elseif ($pg == 3) {
                                    $pgs = 'C';
                                } elseif ($pg == 4) {
                                    $pgs = 'D';
                                } else {
                                    $pgs = 'E';
                                }

                                if ($jawaban->ssc_selected == 1) {
                                    $soal = $soal . '<div class="radio"><label><input type="radio" onchange="jawab()" name="soal-jawaban" value="' . $jawaban->id_jawaban . '" checked><span>' . $pgs . '</span>     '  . $temp_jawaban . '</label></div>';
                                } else {
                                    $soal = $soal . '<div class="radio"><label><input type="radio" onchange="jawab()" name="soal-jawaban" value="' . $jawaban->id_jawaban . '" ><span>' . $pgs . '</span>     '  . $temp_jawaban . '</label></div>';
                                }
                                ++$pg;
                            }
                        }
                    } else if ($query_soal->soal_tipe == "2") {
                        if (!empty($query_soal->ssc_jawaban_text)) {
                            $soal = $soal . '<textarea class="textarea" id="soal-jawaban" name="soal-jawaban" style="width: 100%; height: 150px; font-size: 13px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;">' . $query_soal->ssc_jawaban_text . '</textarea>
                                <button type="button" onclick="jawab()" class="btn btn-default" style="margin-bottom: 5px;" title="Simpan Jawaban">Simpan Jawaban</button>
                                ';
                        } else {
                            $soal = $soal . '<textarea class="textarea" id="soal-jawaban" name="soal-jawaban" style="width: 100%; height: 150px; font-size: 13px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <button type="button" onclick="jawab()" class="btn btn-default" style="margin-bottom: 5px;" title="Simpan Jawaban">Simpan Jawaban</button>
                                ';
                        }
                    }
                    $soal = $soal . '</div>';

                    $data['tes_soal'] = $soal;
                }
            } else {
                $data['data'] = 2;
            }
        }

        return $data;
    }


    function jawabSoal(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'tes-id' => 'required',
            'tes-user-id' => 'required',
            'tes-soal-id' => 'required',
            'tes-soal-nomor' => 'required',
            'soal-jawaban' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "pesan" => $validator->errors()
            ], 200);
        }

        $jawaban = $data['soal-jawaban'];
        $tes_id = $data['tes-id'];
        $tes_user_id = $data['tes-user-id'];
        $tes_soal_id = $data['tes-soal-id'];
        $tes_soal_nomor = $data['tes-soal-nomor'];

        $waktuuser = date('Y-m-d H:i:s');

        $cektes = DB::select('select COUNT(u.id_ssc_user) AS hasil
            from ssc_user u join ssc_to t on t.id_to = u.id_to
            where (u.id_ssc_user="' . $tes_user_id . '" AND
            u.ssc_status="1" AND TIMESTAMPADD(MINUTE, t.durasi, u.created_time)>"' . $waktuuser . '")
            LIMIT 1');

        if ($cektes[0]->hasil > 0) {

            // Mengecek apakah soal ada
            $query_soal = TesSoal::select('ssc_soal.*', 'soal.*')
                ->join('soal', 'ssc_soal.id_soal', '=', 'soal.id_soal')
                ->findOrFail($tes_soal_id);

            if ($query_soal) {

                $data_tes_soal['ssc_change_time'] = date('Y-m-d H:i:s');


                // Memulai transaction mysql
                // Mengecek jenis soal
                if ($query_soal->soal_tipe == "1") {
                    // Mendapatkan data tes
                    $query_tes = Jadwal::findOrFail($tes_id);

                    // Mendapatkan data jawaban
                    $query_jawaban = TesJawaban::select('ssc_jawaban.*', 'jawaban.*')
                        ->join('jawaban', 'ssc_jawaban.id_jawaban', '=', 'jawaban.id_jawaban')
                        ->where('ssc_jawaban.id_ssc_soal', '=', $tes_soal_id)
                        ->where('ssc_jawaban.id_jawaban', '=', $jawaban)
                        ->first();

                    // Mengupdate pilihan jawaban benar
                    $data_jawaban['ssc_selected'] = 1;
                    TesJawaban::where('ssc_jawaban.id_ssc_soal', '=', $tes_soal_id)
                        ->where('ssc_jawaban.id_jawaban', '=', $jawaban)
                        ->update($data_jawaban);

                    // Mengupdate pilihan jawaban salah
                    $data_jawaban['ssc_selected'] = 0;
                    TesJawaban::where('ssc_jawaban.id_ssc_soal', '=', $tes_soal_id)
                        ->where('ssc_jawaban.id_jawaban', '!=', $jawaban)
                        ->update($data_jawaban);

                    // Mengupdate score, change time jika pilihan benar
                    if ($query_jawaban->jawaban_benar == "1") {
                        $data_tes_soal['ssc_nilai'] = $query_tes->skor_benar;
                    } else {
                        $data_tes_soal['ssc_nilai'] = $query_tes->skor_salah;
                    }

                    TesSoal::where('ssc_soal.id_ssc_soal', '=', $tes_soal_id)
                        ->update($data_tes_soal);

                    return response()->json([
                        "status" => 1,
                        "nomor_soal" => $tes_soal_nomor,
                        "pesan" => 'Jawaban yang dipilih berhasil disimpan'
                    ], 200);
                } else if ($query_soal->soal_tipe == "2") {
                    // Mendapatkan data tes
                    $query_tes = Jadwal::findOrFail($tes_id);

                    // Mengupdate change time, dan jawaban essay
                    $data_tes_soal['ssc_jawaban_text'] = $jawaban;
                    $data_tes_soal['ssc_nilai'] = 0;
                    TesSoal::where('ssc_soal.id_ssc_soal', '=', $tes_soal_id)
                        ->update($data_tes_soal);

                    return response()->json([
                        "status" => 1,
                        "nomor_soal" => $tes_soal_nomor,
                        "pesan" => 'Jawaban yang dipilih berhasil disimpan'
                    ], 200);
                }
            }
        } else {
            return response()->json([
                "status" => 2,
                "pesan" => 'Terjadi Kesalahan, Tes sudah selesai'
            ], 200);
        }
    }

    public function getInfo($id)
    {
        $data['data'] = 0;

        if (!empty($id)) {

            $query_tes = TesUser::join('ssc_to', 'ssc_to.id_to', '=', 'ssc_user.id_to')
                ->where('ssc_user.id_ssc_user', '=', $id)
                ->where('ssc_user.ssc_status', '=', '1')
                ->first();

            if ($query_tes) {
                $data['data'] = 1;
                $data['tes_id'] = $id;
                $data['tes_user_id'] = $id;
                $data['tes_nama'] = $query_tes->nama_to;
                $data['tes_dijawab'] = $this->count_by_tesuser_dijawab($id) . ' Soal';
                $data['tes_blum_dijawab'] = $this->count_by_tesuser_blum_dijawab($id) . ' Soal';
            }
        }

        return response()->json([
            $data
        ], 200);
    }

    public function count_by_tesuser_dijawab($id_ssc_user)
    {
        return TesSoal::where('id_ssc_user', '=', $id_ssc_user)
            ->where('ssc_change_time', '!=', "")
            ->count();
    }

    public function count_by_tesuser_blum_dijawab($id_ssc_user)
    {
        return TesSoal::where('id_ssc_user', '=', $id_ssc_user)
            ->whereNull('ssc_change_time')
            ->count();
    }

    public function hentikanTo(Request $request)
    {
        $tes = TesUser::findOrFail($request->get('hentikan-tes-id'));
        $data_tes['ssc_status'] = 4;
        if ($tes) {
            $tes->update($data_tes);
        }
        return redirect('/tryout-main');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
