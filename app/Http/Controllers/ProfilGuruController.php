<?php

namespace App\Http\Controllers;

use App\Profil;
use App\Guru;


class ProfilGuruController extends Controller
{
    public function index()
    {
        $profil = Profil::get()->first();
        $guru = Guru::get();
        return view('guru', compact('profil', 'guru'));
    }
}
