<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;
use App\Group;
use App\Soal;
use App\TesUser;
use DB;
use Validator;
use App\TopikToJadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jadwal = Jadwal::orderBy('id_to', 'desc')->paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $jadwal = jadwal::where('nama_to', 'LIKE', "%$filterKeyword%")->orderBy('id_to', 'desc')->paginate(5);
        }
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::get();
        return view('jadwal.create', compact('kelas'));
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
            'nama_to' => 'required|unique:ssc_to',
            'detail_to' => 'required',
            'rentang-waktu' => 'required',
            'durasi' => 'required',
            'kelas' => 'required'

        ]);

        if ($validasi->fails()) {
            return redirect()->route('jadwal.create')->withInput()->withErrors($validasi);
        }


        $rentang_waktu = $data['rentang-waktu'];
        $tanggal = explode(" - ", $rentang_waktu);
        $data['waktu_mulai'] = $tanggal[0];
        $data['waktu_akhir'] = $tanggal[1];

        $jadwal = Jadwal::create($data);

        foreach ($data['kelas'] as $value) {
            Group::create([
                'id_to' => $jadwal->id_to,
                'id_kelas' => $value
            ]);
        }

        return redirect()->route('jadwal.index')->with('status', 'Jadwal Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $set_topik = TopikToJadwal::select('ssc_topik_set.*', 'topik.nama')
            ->join('topik', 'topik.id_topik', '=', 'ssc_topik_set.id_topik')
            ->where('ssc_topik_set.id_to', '=', $id)->get();
        $lovtopik = DB::select('select t.* ,(select count(s.id_soal)
        from soal s where s.id_topik = t.id_topik) as jml_soal
        from topik t where (select count(s.id_soal)
        from soal s where s.id_topik = t.id_topik) != 0 and t.deleted_at is null order by t.id_topik desc');
        $id_to = $id;

        return view('jadwal.show', compact('set_topik', 'lovtopik', 'id_to'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Group::join('kelas', 'ssc_group.id_kelas', '=', 'kelas.id_kelas')
            ->where('ssc_group.id_to', '=', $id)->get();
        $lovkelas = Kelas::get();
        return view('jadwal.edit', compact('jadwal', 'kelas', 'lovkelas'));
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

        $jadwal = Jadwal::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama_to' => 'required|unique:ssc_to,nama_to,' . $id . ',id_to',
            'detail_to' => 'required',
            'rentang-waktu' => 'required',
            'durasi' => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('jadwal.edit', [$id])->withInput()->withErrors($validasi);
        }

        if ($data['update_kelas'] == '1') {

            $validasi = Validator::make($data, [
                'kelas' => 'required'
            ]);
            if ($validasi->fails()) {
                return redirect()->route('jadwal.edit', [$id])->withInput()->withErrors($validasi);
            }

            foreach ($data['kelas'] as $value) {
                Group::create([
                    'id_to' => $id,
                    'id_kelas' => $value
                ]);
            }
        }

        $rentang_waktu = $data['rentang-waktu'];
        $tanggal = explode(" - ", $rentang_waktu);
        $data['waktu_mulai'] = $tanggal[0];
        $data['waktu_akhir'] = $tanggal[1];

        $jadwal->update($data);

        return redirect()->route('jadwal.index')->with('status', 'Jadwal Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jadwal::findOrFail($id);
        // cek apakah user sudah pernah mengerjakan
        $dataJadwal = TesUser::where('ssc_user.id_to', '=', $id)
            ->get()->count();
        if ($dataJadwal > 0) {
            return back()->withErrors('Jawaban tidak dapat dihapus');
        }
        $data->delete();
        return back()->with('status', 'Jadwal Berhasil didelete');
    }

    public function deleteGroup($id)
    {

        DB::delete('delete
        from ssc_group where id_to =' . $id);
        return redirect()->route('jadwal.edit', [$id]);
    }


    public function setTopik(Request $request)
    {

        $data = $request->all();

        $validasi = Validator::make($data, [
            'id_topik' => 'required',
            'id_to' => 'required',
        ]);

        $query_jml = DB::select('select count(s.id_soal) as jml
        from soal s where s.id_topik =' . $request->get('id_topik'));

        $jml_soal = $query_jml[0]->jml;

        $data['jumlah_soal'] = $jml_soal;

        if ($validasi->fails()) {
            return redirect()->route('jadwal.show', [$request['id_to']])->withInput()->withErrors($validasi);
        }

        $ssc_to = Jadwal::findOrFail($request['id_to']);
        $data_jadwal = [
            'skor_maksimal' => $ssc_to['skor_benar'] * $data['jumlah_soal']
        ];

        TopikToJadwal::create($data);
        $ssc_to->update($data_jadwal);

        return redirect()->route('jadwal.show', [$request['id_to']])->with('status', 'Jadwal Berhasil ditambahkan');
    }

    public function setTopikDelete($id)
    {
        $data = TopikToJadwal::findOrFail($id);

        $id_to = $data->id_to;
        $dataJadwal = TesUser::where('ssc_user.id_to', '=', $id_to)
            ->get()->count();
        if ($dataJadwal > 0) {
            return back()->withErrors('Topik tidak dapat dihapus');
        }
        $ssc_to = Jadwal::findOrFail($id_to);
        $data_jadwal = [
            'skor_maksimal' => '0.00'
        ];
        $data->delete();
        $ssc_to->update($data_jadwal);
        return back()->with('status', 'Berhasil menghapus topik dari jadwal');
    }
}
