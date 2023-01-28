<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;
use Storage;
use Validator;



class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::get()->first();
        return view('profil.edit', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $profil = Profil::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'logo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png',
            'logo_filosofi' => 'sometimes|nullable|image|mimes:jpeg,jpg,png',
            'sejarah' => 'required',
            'filosofi' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('profil.index')->withErrors($validasi);
        }

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                Storage::disk('upload')->delete($profil->logo);
                $logo = $request->file('logo');
                $extention = $logo->getClientOriginalExtension();
                $namaFoto = "front/" . date('YmdHis') . "1" . "." . $extention;
                $upload_path = 'public/uploads/front';
                $request->file('logo')->move($upload_path, $namaFoto);
                $data['logo'] = $namaFoto;
            }
        }

        if ($request->hasFile('logo_filosofi')) {
            if ($request->file('logo_filosofi')->isValid()) {
                Storage::disk('upload')->delete($profil->logo_filosofi);
                $logo_filosofi = $request->file('logo_filosofi');
                $extention = $logo_filosofi->getClientOriginalExtension();
                $namaFoto = "front/" . date('YmdHis') . "2" . "." . $extention;
                $upload_path = 'public/uploads/front';
                $request->file('logo_filosofi')->move($upload_path, $namaFoto);
                $data['logo_filosofi'] = $namaFoto;
            }
        }

        $profil->update($data);
        return redirect()->route('profil.index')->with('status', 'Profil Berhasil diupdate');
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
