<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\TesUser;
use Validator;
use App\TesSoal;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $lovjadwal = Jadwal::get();
        $url = url('/');
        return view('evaluasi.index', compact('lovjadwal', 'url'));
    }

    public function getJawaban(Request $request)
    {

        $data = $request->all();
        $jadwal = $data['jadwal'];
        $id_to = '';
        if (!empty($jadwal)) {
            $id_to = $jadwal;
        }

        $soalJawaban = TesUser::select('ssc_user.id_ssc_user', 'ssc_soal.ssc_jawaban_text', 'ssc_soal.id_ssc_soal', 'ssc_to.*', 'soal.*')
            ->where('soal.soal_tipe', '=', '2')
            ->where('ssc_user.id_to', '=', $id_to)
            ->whereNotNull('ssc_soal.ssc_jawaban_text')
            ->whereNull('ssc_soal.ssc_comment')
            ->join('ssc_to', 'ssc_to.id_to', '=', 'ssc_user.id_to')
            ->join('ssc_soal', 'ssc_soal.id_ssc_user', '=', 'ssc_user.id_ssc_user')
            ->join('soal', 'soal.id_soal', '=', 'ssc_soal.id_soal')
            ->get();


        return response()->json([
            'data' => $soalJawaban
        ], 200);
    }


    public function simpanNilai(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'evaluasi-testlog-id' => 'required',
            'evaluasi-nilai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "pesan" => $validator->errors()
            ], 200);
        }

        $data_soal['ssc_comment'] = 'sudah di koreksi';
        $data_soal['ssc_nilai'] = $data['evaluasi-nilai'];

        $soal =  TesSoal::findOrFail($data['evaluasi-testlog-id']);
        $soal->update($data_soal);

        return response()->json([
            "status" => 1,
            "pesan" => 'Berhasil menyimpan nilai'
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
