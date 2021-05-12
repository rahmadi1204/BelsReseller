<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function store()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(request()->only('username', 'password'))) {
            if(Auth::user()->role == 'admin'){
                session()->flash("loginOk","Selamat Datang ".Auth::user()->username);
                return redirect('/admin');
            } else {
                session()->flash("loginOk","Selamat Datang ".Auth::user()->username);
                return redirect('/');
            }
        } else {
            session()->flash("loginFail","Username / Password Salah");
            $oldUsername = request('username');
            return view('auth.login', ['oldUsername' => $oldUsername]);
        }
    }
   public function logout() {
   Auth::logout();
   session()->flash("logout","Anda Sudah Logout");
            $oldUsername = request('username');
            return view('auth.login', ['oldUsername' => $oldUsername]);
   }
}
