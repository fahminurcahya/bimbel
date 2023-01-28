<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use App\Kelas;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Siswa::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $siswa = Siswa::where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $lovkelas = Kelas::get();
        return view('siswa.create', compact('lovkelas'));
    }

    public function store(Request $request)
    {
        $data = $request->all();


        $validasi = Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'nama' => 'required',
            'id_kelas' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kota_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_hp_ortu' => 'required',
            'asal_sekolah' => 'required'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('siswa.create')->withInput()->withErrors($validasi);
        }

        $arr = explode("-", $data['tanggal_lahir']);
        $pass = $arr[2] . $arr[1] . $arr[0];
        $data['password'] = bcrypt($pass);
        $user = User::create([
            'email' => $data['email'],
            'password' => $data['password'],
            'username' => $data['email'],
            'level' => 'siswa',
        ]);

        $namaUp = strtoupper($data['nama']);
        $data['nama'] =  $namaUp;

        // dd(json_encode($user));
        Siswa::create([
            'nama' => $data['nama'],
            'id_user' => $user->id,
            'id_kelas' => $data['id_kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'kota_lahir' => $data['kota_lahir'],
            'orang_tua' => $data['orang_tua'],
            'alamat' => $data['alamat'],
            'no_hp_ortu' => $data['no_hp_ortu'],
            'no_hp' => $data['no_hp'],
            'asal_sekolah' => $data['asal_sekolah']
        ]);
        return redirect()->route('siswa.index')->with('status', 'Siswa Berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::select('siswa.*', 'users.*', 'kelas.nama as nama_kelas')
            ->join('users', 'siswa.id_user', '=', 'users.id')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $lovkelas = Kelas::get();
        $siswa = Siswa::join('users', 'siswa.id_user', '=', 'users.id')->findOrFail($id);
        return view('siswa.edit', compact('siswa', 'lovkelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'email' => 'required|email|max:255|unique:users,email,' . $data['id_user'],
            'password' => 'sometimes|nullable|min:6',
            'nama' => 'required',
            'id_kelas' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kota_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_hp_ortu' => 'required',
            'asal_sekolah' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('siswa.edit', [$id])->withErrors($validasi);
        }

        $user = [
            'password' => $data['password'],
        ];

        $data_siswa = [
            'nama' => $data['nama'],
            'id_user' => $data['id_user'],
            'id_kelas' => $data['id_kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'kota_lahir' => $data['kota_lahir'],
            'orang_tua' => $data['orang_tua'],
            'alamat' => $data['alamat'],
            'no_hp_ortu' => $data['no_hp_ortu'],
            'no_hp' => $data['no_hp'],
            'asal_sekolah' => $data['asal_sekolah']
        ];

        if ($request->input('password')) {
            $user['password'] = bcrypt($data['password']);
        } else {
            $user = Arr::except($user, ['password']);
        }
        User::where('id', $data['id_user'])->update($user);
        $siswa->update($data_siswa);
        return redirect()->route('siswa.index')->with('status', 'Siswa Berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        $user = User::findOrFail($data->id_user);
        $data->delete();
        $user->delete();
        return redirect()->route('siswa.index')->with('status', 'siswa Berhasil didelete');
    }
}
