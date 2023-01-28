<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publish;
use Validator;

class PublishController extends Controller
{
    public function index(Request $request)
    {
        $publish = Publish::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $publish = Publish::where('judul', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('publish.index', compact('publish'));
    }

    public function create()
    {
        return view('publish.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'judul' => 'required',
            'detail' => 'required'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('publish.create')->withInput()->withErrors($validasi);
        }

        Publish::create($data);
        return redirect()->route('publish.index')->with('status', 'Berhasil Publish');
    }

    public function destroy($id)
    {
        $data = Publish::findOrFail($id);
        $data->delete();
        return redirect()->route('publish.index')->with('status', 'Berhasil Delete');
    }

    public function uploads(Request $request)
    {
        //JIKA ADA DATA YANG DIKIRIMKAN
        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
            //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/publish'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS

            //KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('uploads/publish/' . $fileName);
            $msg = 'uploaded successfully';
            //DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }
    }
}
