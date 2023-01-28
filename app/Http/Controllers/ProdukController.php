<?php

namespace App\Http\Controllers;

use App\Produk;
use Validator;
use App\Profil;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $produk = Produk::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
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
            'detail' => 'required',
            'kategori' => 'required'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('produk.create')->withInput()->withErrors($validasi);
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('status', 'Produk Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
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
        $produk = Produk::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama' => 'required',
            'detail' => 'required',
            'kategori' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('produk.edit', [$id])->withErrors($validasi);
        }

        $produk->update($data);
        return redirect()->route('produk.index')->with('status', 'Produk Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return redirect()->route('produk.index')->with('status', 'produk Berhasil didelete');
    }

    public function sd()
    {
        $profil = Profil::get()->first();
        $produk = Produk::where('kategori', '=', 'SD')->get();
        return view('sd', compact('produk', 'profil'));
    }

    public function smp()
    {
        $profil = Profil::get()->first();
        $produk = Produk::where('kategori', '=', 'SMP')->get();
        return view('smp', compact('produk', 'profil'));
    }

    public function sma()
    {
        $profil = Profil::get()->first();
        $produk = Produk::where('kategori', '=', 'SMA')->get();
        return view('sma', compact('produk', 'profil'));
    }
}
