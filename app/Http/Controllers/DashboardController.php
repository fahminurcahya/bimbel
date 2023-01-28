<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Jadwal;
use App\Pendaftaran;
use App\Siswa;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $guru = Guru::count();
        $siswa = Siswa::count();
        $ujianberlangsung = Jadwal::where('ssc_to.waktu_mulai', '<=', date('Y-m-d H:i:s'))
            ->where('ssc_to.waktu_akhir', '>=', date('Y-m-d H:i:s'))->count();
        $nextujian = Jadwal::where('ssc_to.waktu_mulai', '>', date('Y-m-d H:i:s'))->count();

        $query = DB::select('select count(id_daftar) AS hasil from pendaftaran where DATE(created_at) ="' . date('Y-m-d') . '"');
        $pendaftar = $query[0]->hasil;
        // where DATE(created_at) ="'.date('Y-m-d').'"');

        return view('dashboard.index', compact('guru', 'siswa', 'ujianberlangsung', 'nextujian', 'pendaftar'));
    }
}
