<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $calonsiswa = Pendaftaran::select('pendaftaran.*', 'jenjang.nama as nama_jenjang')
            ->orderByDesc('pendaftaran.created_at')
            ->join('jenjang', 'jenjang.id_jenjang', '=', 'pendaftaran.jenjang')->paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $calonsiswa = Pendaftaran::select('pendaftaran.*', 'jenjang.nama as nama_jenjang')
                ->where('nama', 'LIKE', "%$filterKeyword%")
                ->join('jenjang', 'jenjang.id_jenjang', '=', 'pendaftaran.jenjang')->paginate(5);
        }
        return view('calonsiswa.index', compact('calonsiswa'));
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
        $pendaftar = Pendaftaran::select('pendaftaran.*', 'jenjang.nama as nama_jenjang')
            ->join('jenjang', 'jenjang.id_jenjang', '=', 'pendaftaran.jenjang')->findOrFail($id);
        return view('calonsiswa.show', compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calonsiswa = Pendaftaran::findOrFail($id);
        return view('calonsiswa.edit', compact('calonsiswa'));
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
        $data = Pendaftaran::findOrFail($id);
        $data->delete();
        return redirect()->route('pendaftar.index')->with('status', 'Data Berhasil didelete');
    }
}
