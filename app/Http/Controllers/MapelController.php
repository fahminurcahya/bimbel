<?php

namespace App\Http\Controllers;

use App\Mapel;
use Validator;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = Mapel::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $mapel = Mapel::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('mapel.create')->withInput()->withErrors($validasi);
        }

        Mapel::create($data);

        return redirect()->route('mapel.index')->with('status', 'Mata Pelajaran Berhasil ditambahkan');
    }

    public function show($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.show', compact('mapel'));
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('mapel.edit', [$id])->withErrors($validasi);
        }
        $mapel->update($data);
        return redirect()->route('mapel.index')->with('status', 'Mata Pelajaran Berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Mapel::findOrFail($id);
        $data->delete();
        return redirect()->route('mapel.index')->with('status', 'Mata Pelajaran Berhasil didelete');
    }
}
