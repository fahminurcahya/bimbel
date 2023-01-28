<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {

        $profil = Profil::get()->first();
        return view('login', compact('profil'));
    }

    public function do_login(Request $request)
    {
        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data) && Auth::user()->level == 'siswa') {
            return $this->do_logout($request);
        } else if (Auth::attempt($user_data) && (Auth::user()->level == 'akademik' || Auth::user()->level == 'admin')) {
            return redirect('/dashboard');
        } else {
            return back()->withErrors('email dan password salah');
        }
    }

    public function do_logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: back()->withErrors('email dan password salah');
    }

    protected function loggedOut(Request $request)
    {
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
