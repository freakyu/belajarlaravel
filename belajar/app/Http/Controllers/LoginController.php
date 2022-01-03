<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    //Menggunakan model user untuk menangkap data akun (php line 35)
use Illuminate\Support\Facades\Auth;    //Menggunakan ini agar auth dapat dipakai

class LoginController extends Controller
{
    
   public function login() {            //Membuat view/halaman login dengan judul halaman
    return view('website.login', [
        'title' => "Login",
        'active' => 'login'
    ]);
   }

   public function daftar() {           //Membuat view/halaman daftar dengan judul halaman
    return view('website.daftar', [
        'title' => "Daftar",
        'active' => 'daftar'
    ]);
   }

   public function store(Request $request)  //untuk menyimpan data user yang daftar
   {
        $validated = $request->validate([
            'name' => 'required | max:50',
            'email' => 'required | unique:users',
            'password' => 'required | max:8',
        ]);
        $validated['password'] = bcrypt($validated['password']);    //Meng-enkripsi password

        User::create($validated); //membuat data akun

        return redirect('/login')->with('daftar', 'berhasil! Silahkan Login!'); //kalau berhasil diarahkan ke halaman login
   }

   public function auth(Request $request)   //untuk login
   {
        $auth = $request->validate([
            'email' => 'required | email',
            'password' => 'required | max:8',
        ]);

        if(Auth::attempt($auth)) {  //Jika data yang diinput sesuai
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard'); //diarahkan ke halaman dashboard
        }

        return back()->with('login', 'login gagal!'); //gagal login balik ke halaman login lagi dan tampilkan pesan kesalahan
   }

   public function logout(Request $request) //untuk logout
   {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');   //diarahkan ke halaman utama
   }

}
