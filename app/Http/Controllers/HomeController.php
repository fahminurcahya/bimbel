<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profil = Profil::get()->first();
        return view('home', compact('profil'));
    }
}
