<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Siswa;
use App\Group;
use App\TesUser;
use App\TesSoal;
use DB;


class HasilExport implements FromView, ShouldAutoSize
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {

        $id = $this->id;

        $getSiswa = Siswa::select('siswa.nama as nama_siswa', 'siswa.id_siswa', 'kelas.nama as nama_kelas')
            ->where('siswa.id_kelas', '=', $id)
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->groupBy('siswa.nama')->get();


        $kelas = Group::select('topik.*', 'ssc_to.id_to')
            ->where('ssc_group.id_kelas', '=', $id)
            ->join('kelas', 'kelas.id_kelas', '=', 'ssc_group.id_kelas')
            ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_group.id_to')
            ->join('ssc_topik_set', 'ssc_topik_set.id_to', '=', 'ssc_to.id_to')
            ->join('topik', 'ssc_topik_set.id_topik', '=', 'topik.id_topik')->get();

        foreach ($kelas as $kel) {
            $arr = array();
            foreach ($getSiswa as $sis) {
                $cekUser = TesUser::where('ssc_user.id_to', '=', $kel->id_to)
                    ->where('ssc_user.id_siswa', '=', $sis->id_siswa)->get();
                if ($cekUser->count() > 0) {
                    $hasil = TesSoal::select(DB::raw('CASE  WHEN SUM(ssc_soal.ssc_nilai) is null THEN 0 ELSE SUM(ssc_soal.ssc_nilai)  END AS nilai, COUNT(CASE  WHEN ssc_soal.ssc_nilai=0 THEN 1 END) AS jawaban_salah, COUNT(CASE  WHEN ssc_soal.ssc_nilai>0 THEN 1 END) AS jawaban_benar'))
                        ->where('ssc_soal.id_ssc_user', '=', $cekUser->first()->id_ssc_user)
                        ->get()->first();
                    array_push($arr, $hasil);
                } else {
                    $hasil = TesSoal::select(DB::raw('CASE  WHEN SUM(ssc_soal.ssc_nilai) is null THEN 0 ELSE SUM(ssc_soal.ssc_nilai) END AS nilai, COUNT(CASE  WHEN ssc_soal.ssc_nilai=0 THEN 1 END) AS jawaban_salah, COUNT(CASE  WHEN ssc_soal.ssc_nilai>0 THEN 1 END) AS jawaban_benar'))
                        ->whereNull('ssc_soal.id_ssc_user')
                        ->get()->first();
                    array_push($arr, $hasil);
                }
            }
            $kel->nilai_siswa = $arr;
        }
        // dd($kelas);

        return view('export.hasil', compact('kelas', 'getSiswa'));
    }
}
