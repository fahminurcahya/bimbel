<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\TesSoal;
use App\Topik;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_topik = $request['id_topik'];
        if (!$id_topik) {
            return redirect()->route('topik.index');
        }
        return view('soal.create', compact('id_topik'));
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
            'soal_tipe' => 'required',
            'soal_detail' => 'required',
            'id_topik' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('soal.create', ['id_topik' => $data['id_topik']])->withInput()->withErrors($validasi);
        }

        Soal::create($data);

        return redirect()->route('soal', ['id' => $data['id_topik']])->with('status', 'Soal Berhasil ditambahkan');
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

    public function list($id, Request $request)
    {
        $soal = DB::select('select s.* ,(select count(j.id_jawaban)
        from jawaban j where j.id_soal = s.id_soal) as jml_jawaban
        from soal s where s.id_topik =' . $id);
        $topik = Topik::findOrFail($id);
        $soal = $this->arrayPaginator($soal, $request);
        return view('soal.index', compact('soal', 'topik'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request['page'];
        $perPage = 50;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        return view('soal.edit', compact('soal'));
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

        $soal = Soal::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'soal_detail' => 'required',
            'id_topik' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('soal.edit', [$id])->withInput()->withErrors($validasi);
        }

        $soal->update($data);

        return redirect()->route('soal', ['id' => $data['id_topik']])->with('status', 'Soal Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Soal::findOrFail($id);
        // cek apakah topik sudah di pake
        $dataSoal = TesSoal::where('ssc_soal.id_soal', '=', $id)
            ->get()->count();
        if ($dataSoal > 0) {
            return back()->withErrors('Soal tidak dapat dihapus');
        }
        $data->delete();
        return back()->with('status', 'Soal Berhasil didelete');
    }

    public function uploadImage(Request $request)
    {
        //JIKA ADA DATA YANG DIKIRIMKAN
        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
            //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/soal'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS

            //KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('uploads/soal/' . $fileName);
            $msg = 'Image uploaded successfully';
            //DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }
    }
}
