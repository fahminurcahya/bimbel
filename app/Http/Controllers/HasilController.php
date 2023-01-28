<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;
use App\Siswa;
use App\TesJawaban;
use App\TesSoal;
use App\TesUser;
use DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lovjadwal = Jadwal::orderBy('id_to', 'desc')->get();
        $lovkelas = Kelas::get();
        $url = url('/');
        return view('hasil.index', compact('lovjadwal', 'url', 'lovkelas'));
    }

    public function getHasil(Request $request)
    {

        $data = $request->all();
        $jadwal = $data['jadwal'];
        $kelas = $data['kelas'];

        $id_to = '';
        $id_kelas = '';

        if (!empty($jadwal)) {
            $id_to = $jadwal;
        }

        if (!empty($kelas)) {
            $id_kelas = $kelas;
        }

        $hasilTes = TesUser::select('ssc_user.*', 'ssc_to.*', 'siswa.*', 'topik.nama as mapel', 'kelas.nama as nama_kelas', DB::raw('SUM(ssc_soal.ssc_nilai) AS nilai '))
            ->where('ssc_to.id_to', '=', $id_to)
            ->where('siswa.id_kelas', '=', $id_kelas)
            ->join('siswa', 'ssc_user.id_siswa', '=', 'siswa.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_user.id_to')
            ->join('ssc_topik_set', 'ssc_to.id_to', '=', 'ssc_topik_set.id_to')
            ->join('topik', 'ssc_topik_set.id_topik', '=', 'topik.id_topik')
            ->join('ssc_soal', 'ssc_soal.id_ssc_user', '=', 'ssc_user.id_ssc_user')
            ->groupBy('ssc_user.id_ssc_user')
            ->get();


        return response()->json([
            'data' => $hasilTes
        ], 200);
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

    public function detailHasil(Request $request)
    {
        $id_ssc_user = $request['id_ssc_user'];
        $id_siswa = $request['id_siswa'];
        $dataUser = TesUser::findOrFail($id_ssc_user);
        $url = url('/');
        if ($dataUser) {
            $dataJadwal = Jadwal::where('ssc_to.id_to', '=', $dataUser->id_to)->get()->first();
            $dataSiswa = Siswa::where('siswa.id_siswa', '=', $dataUser->id_siswa)->get()->first();

            $data['ssc_user_id'] = $id_ssc_user;
            $data['nama_to'] = $dataJadwal->nama_to;
            $data['tes_mulai'] = $dataUser->created_time;
            $data['nama_siswa'] = $dataSiswa->nama;

            $hasil = TesSoal::select(DB::raw('SUM(ssc_soal.ssc_nilai) AS nilai, COUNT(CASE  WHEN ssc_soal.ssc_nilai=0 THEN 1 END) AS jawaban_salah, COUNT(*) AS total_soal '))
                ->where('ssc_soal.id_ssc_user', '=', $id_ssc_user)
                ->get()->first();



            $data['nilai'] = $hasil->nilai . '  /  ' . $dataJadwal->skor_maksimal . '  (nilai / nilai maksimal) ';

            $data['benar'] = ($hasil->total_soal - $hasil->jawaban_salah) . '  /  ' . $hasil->total_soal . '  (jawaban benar / total soal)';

            return view('hasil.show', compact('data', 'url'));


            // $this->template->display_admin($this->kelompok . '/tes_hasil_detail_view', 'Hasil Tes Detail', $data);
        }

        return view('hasil.show', compact('data', 'url'));
    }


    function getDetail(Request $request)
    {
        $id_ssc_user = $request['id_ssc_user'];
        $detail = TesSoal::where('ssc_soal.id_ssc_user', '=', $id_ssc_user)
            ->join('soal', 'ssc_soal.id_soal', '=', 'soal.id_soal')
            ->orderBy('ssc_soal.ssc_order', 'ASC')->get();

        foreach ($detail as $det) {
            if ($det->soal_tipe == 1) {
                $jawaban = TesJawaban::where('ssc_jawaban.id_ssc_soal', '=', $det->id_ssc_soal)
                    ->join('jawaban', 'jawaban.id_jawaban', '=', 'ssc_jawaban.id_jawaban')
                    ->orderBy('ssc_jawaban.ssc_order', 'ASC')->get();
                $det['jawaban'] = $jawaban;
            }
        }

        return response()->json([
            'data' => $detail
        ], 200);
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
        //
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
