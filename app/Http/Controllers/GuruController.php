<?php

namespace App\Http\Controllers;

use App\Guru;
use Validator;
use Illuminate\Http\Request;
use Storage;


class GuruController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $guru = Guru::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required',
            'gambar_guru' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'ttl' => 'required',
            'pendidikan' => 'required',
            'moto' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('guru.create')->withInput()->withErrors($validasi);
        }

        if ($request->file('gambar_guru')->isValid()) {
            $gambar_guru = $request->file('gambar_guru');
            $extention = $gambar_guru->getClientOriginalExtension();
            $namaFoto = "guru/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/guru';
            $request->file('gambar_guru')->move($upload_path, $namaFoto);
            $data['gambar_guru'] = $namaFoto;
        }

        // dd(json_encode($user));
        Guru::create($data);
        return redirect()->route('guru.index')->with('status', 'Guru Berhasil ditambahkan');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required',
            'gambar_guru' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'ttl' => 'required',
            'pendidikan' => 'required',
            'moto' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('guru.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar_guru')) {
            if ($request->file('gambar_guru')->isValid()) {
                Storage::disk('upload')->delete($guru->gambar_guru);
                $gambar_guru = $request->file('gambar_guru');
                $extention = $gambar_guru->getClientOriginalExtension();
                $namaFoto = "guru/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/guru';
                $request->file('gambar_guru')->move($upload_path, $namaFoto);
                $data['gambar_guru'] = $namaFoto;
            }
        }

        $guru->update($data);
        return redirect()->route('guru.index')->with('status', 'Guru Berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Guru::findOrFail($id);
        $data->delete();
        Storage::disk('upload')->delete($data->gambar_guru);
        return redirect()->route('guru.index')->with('status', 'Guru Berhasil didelete');
    }
}
