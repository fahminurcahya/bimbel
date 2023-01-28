<?php

namespace App\Http\Controllers;

use App\Exports\HasilExport;
use App\Kelas;

use Illuminate\Http\Request;

use Excel;

class ReportController extends Controller
{
    public function index()
    {
        $lovkelas = kelas::join('ssc_group', 'kelas.id_kelas', '=', 'ssc_group.id_kelas')
            ->groupBy('kelas.id_kelas')->get();
        return view('report.index', compact('lovkelas'));
    }

    function export(Request $request)
    {
        $id = $request->get('kelas');
        $tgl = now();
        return Excel::download(new HasilExport($id), 'hasil' . $tgl . '.xlsx');
    }
}
