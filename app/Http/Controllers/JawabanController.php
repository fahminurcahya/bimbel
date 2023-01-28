<?php

namespace App\Http\Controllers;

use App\Jawaban;
use Illuminate\Http\Request;
use App\Soal;
use App\TesJawaban;
use Validator;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list(Request $request)
    {
        $jawaban = Jawaban::where('id_soal', '=', $request['id'])->paginate(5);
        $soal = Soal::findOrFail($request['id']);
        return view('jawaban.index', compact('jawaban', 'soal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_soal = $request['id_soal'];
        if (!$id_soal) {
            return redirect()->route('topik.index');
        }
        return view('jawaban.create', compact('id_soal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'jawaban_desc' => 'required',
            'jawaban_benar' => 'required',
            'id_soal' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('jawaban.create', ['id_soal' => $data['id_soal']])->withInput()->withErrors($validasi);
        }
        $data['is_aktif'] = '1';

        Jawaban::create($data);

        return redirect()->route('jawaban', ['id' => $data['id_soal']])->with('status', 'Jawaban Berhasil ditambahkan');
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
        $jawaban = Jawaban::findOrFail($id);
        return view('jawaban.edit', compact('jawaban'));
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
        $jawaban = Jawaban::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'jawaban_desc' => 'required',
            'jawaban_benar' => 'required',
            'id_soal' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('jawaban.create', ['id_soal' => $data['id_soal']])->withInput()->withErrors($validasi);
        }
        $data['is_aktif'] = '1';

        $jawaban->update($data);

        return redirect()->route('jawaban', ['id' => $data['id_soal']])->with('status', 'Jawaban Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jawaban::findOrFail($id);
        // cek apakah user sudah pernah mengerjakan
        $dataJawaban = TesJawaban::where('ssc_jawaban.id_jawaban', '=', $id)
            ->get()->count();
        if ($dataJawaban > 0) {
            return back()->withErrors('Jawaban tidak dapat dihapus');
        }
        $data->delete();
        return back()->with('status', 'Jawaban Berhasil didelete');
    }
}
