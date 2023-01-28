<?php

namespace App\Http\Controllers;

use App\Profil;
use App\WhyUs;
use Validator;
use Storage;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index(Request $request)
    {
        $whyus = WhyUs::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $whyus = WhyUs::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('whyus.index', compact('whyus'));
    }


    public function front()
    {
        $profil = Profil::get()->first();
        $whyus = WhyUs::get();
        return view('whyus', compact('profil', 'whyus'));
    }

    public function create()
    {
        return view('whyus.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('setwhyus.create')->withInput()->withErrors($validasi);
        }

        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $namaFoto = "whyus/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/whyus';
            $request->file('gambar')->move($upload_path, $namaFoto);
            $data['gambar'] = $namaFoto;
        }

        WhyUs::create($data);
        return redirect()->route('setwhyus.index')->with('status', 'Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $whyus = WhyUs::findOrFail($id);
        return view('whyus.edit', compact('whyus'));
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
        $whyus = WhyUs::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'deskripsi' => 'required',
            'gambar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('setwhyus.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar')) {
            if ($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($whyus->gambar);
                $gambar = $request->file('gambar');
                $extention = $gambar->getClientOriginalExtension();
                $namaFoto = "whyus/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/whyus';
                $request->file('gambar')->move($upload_path, $namaFoto);
                $data['gambar'] = $namaFoto;
            }
        }

        $whyus->update($data);
        return redirect()->route('setwhyus.index')->with('status', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WhyUs::findOrFail($id);
        $data->delete();
        Storage::disk('upload')->delete($data->gambar);
        return redirect()->route('setwhyus.index')->with('status', 'Berhasil didelete');
    }
}
