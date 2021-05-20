<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            session()->flash("loginOk","Selamat Datang ".Auth::user()->username);
            return redirect('/');
        } else {
            session()->flash("loginFail","Username / Password Salah");
            $oldUsername = request('username');
            return view('auth.login', ['oldUsername' => $oldUsername]);
        }
    }
    public function change()
    {
        return view('resellers.change-password');
    }
    public function changePassword()
    {
        $id = Auth::user()->id;
        $request = request()->all();
        $cek = DB::table('users')
        ->where('id','=',$id)
        ->value('password');
        if (
            Hash::check($request['oldPassword'], $cek)
        ) {
           DB::table('users')
           ->where('id','=',$id)
           ->update([
               'password' =>bcrypt( $request['newPassword'])
           ]);
           session()->flash("Ok","Password Sudah Diganti");
           return redirect('/');
        } else {
            session()->flash("Fail","Password Gagal Diganti");
            return redirect('change-password');
        }
    }
   public function logout() {
   Auth::logout();
   session()->flash("logout","Anda Sudah Logout");
            $oldUsername = request('username');
            return view('auth.login', ['oldUsername' => $oldUsername]);
   }
}
