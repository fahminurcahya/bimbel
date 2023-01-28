<?php

namespace App\Http\Controllers;

use App\Jenjang;
use App\Profil;
use Validator;
use App\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::get()->first();
        $lovjenjang = Jenjang::get();
        return view('daftar', compact('profil', 'lovjenjang'));
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
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kota_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_hp_ortu' => 'required',
            'asal_sekolah' => 'required',
            'jenjang' => 'required',
            'info_ssc' => 'required',
            'pembayaran' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('daftar.index')->withInput()->withErrors($validasi);
        }
        $namaUp = strtoupper($data['nama']);

        $infostr = implode(",", $data['info_ssc']);
        $data['info_ssc'] =  $infostr;
        $data['nama'] =  $namaUp;


        Pendaftaran::create($data);
        return redirect()->route('success')->with('status', 'Anda Berhasil Daftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

    public function success()
    {
        $profil = Profil::get()->first();
        return view('success', compact('profil'));
    }
}
