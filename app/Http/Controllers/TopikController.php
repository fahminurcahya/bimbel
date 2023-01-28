<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topik;
use App\TopikToJadwal;
use Validator;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topik = DB::select('select t.* ,(select count(s.id_soal)
            from soal s where s.id_topik = t.id_topik) as jml_soal
            from topik t where deleted_at is null order by t.id_topik desc');

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $topik = DB::select('select t.* ,(select count(s.id_soal)
            from soal s where s.id_topik = t.id_topik) as jml_soal
            from topik t where t.nama like"%' . $filterKeyword . '%" and deleted_at is null order by t.id_topik desc');
        }
        $topik = $this->arrayPaginator($topik, $request);

        return view('topik.index', compact('topik'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request['page'];
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_slice($array, $offset, $perPage, true),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topik.create');
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
            'deskripsi' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('topik.create')->withInput()->withErrors($validasi);
        }
        $data['is_aktif'] = '1';
        Topik::create($data);

        return redirect()->route('topik.index')->with('status', 'Topik Berhasil ditambahkan');
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
        $topik = Topik::findOrFail($id);
        return view('topik.edit', compact('topik'));
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
        $topik = Topik::findOrFail($id);
        $data = $request->all();


        $validasi = Validator::make($data, [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('topik.edit', [$id])->withErrors($validasi);
        }

        $data['is_aktif'] = '1';
        $topik->update($data);
        return redirect()->route('topik.index')->with('status', 'Topik Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Topik::findOrFail($id);
        // cek apakah topik sudah di pake
        $dataTopik = TopikToJadwal::join('topik', 'ssc_topik_set.id_topik', '=', 'topik.id_topik')
            ->where('ssc_topik_set.id_topik', '=', $id)
            ->get()->count();
        if ($dataTopik > 0) {
            return redirect()->route('topik.index')->withErrors('Topik tidak dapat dihapus');
        }
        $data->delete();
        return redirect()->route('topik.index')->with('status', 'Topik Berhasil didelete');
    }
}
