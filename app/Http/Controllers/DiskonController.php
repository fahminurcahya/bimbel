<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diskon;
use App\Profil;
use Validator;
use Storage;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diskon = Diskon::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $diskon = Diskon::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('diskon.index', compact('diskon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diskon.create');
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
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('diskon.create')->withInput()->withErrors($validasi);
        }

        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $namaFoto = "diskon/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/diskon';
            $request->file('gambar')->move($upload_path, $namaFoto);
            $data['gambar'] = $namaFoto;
        }

        Diskon::create($data);
        return redirect()->route('diskon.index')->with('status', 'Diskon Berhasil ditambahkan');
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
        $diskon = Diskon::findOrFail($id);
        return view('diskon.edit', compact('diskon'));
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
        $diskon = Diskon::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required',
            'gambar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('diskon.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar')) {
            if ($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($diskon->gambar);
                $gambar = $request->file('gambar');
                $extention = $gambar->getClientOriginalExtension();
                $namaFoto = "diskon/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/diskon';
                $request->file('gambar')->move($upload_path, $namaFoto);
                $data['gambar'] = $namaFoto;
            }
        }

        $diskon->update($data);
        return redirect()->route('diskon.index')->with('status', 'Diskon Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Diskon::findOrFail($id);
        $data->delete();
        Storage::disk('upload')->delete($data->gambar);
        return redirect()->route('diskon.index')->with('status', 'Diskon Berhasil didelete');
    }

    public function front()
    {
        $diskon = Diskon::get();
        $profil = Profil::get()->first();
        return view('diskon', compact('diskon', 'profil'));
    }
}
