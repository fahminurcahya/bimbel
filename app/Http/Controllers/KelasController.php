<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use Validator;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::paginate(10);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $kelas = Kelas::where('nama', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('kelas.create')->withInput()->withErrors($validasi);
        }

        Kelas::create($data);

        return redirect()->route('kelas.index')->with('status', 'Kelas Berhasil ditambahkan');
    }

    public function show($id)
    {
        $id_kelas = $id;
        $kelas = Kelas::findOrFail($id);

        $siswa = Siswa::select('siswa.nama')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->where('siswa.id_kelas', '=', $id)
            ->orderBy('siswa.nama', 'ASC')
            ->get();
        return view('kelas.show', compact('kelas', 'siswa', 'id_kelas'));
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('kelas.edit', [$id])->withErrors($validasi);
        }
        $kelas->update($data);
        return redirect()->route('kelas.index')->with('status', 'Kelas Berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return redirect()->route('kelas.index')->with('status', 'Kelas Berhasil didelete');
    }
}
