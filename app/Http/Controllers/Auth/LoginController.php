<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Dinas_pengguna;
use App\Relawan_pengguna;
use Alert;

class LoginController extends Controller
{
    function showLogin() {
      return view ('login.masuk');
    }
    function login(Request $request) {
      if (Auth::guard('dinas_pengguna')->attempt(['email_pengguna'=>$request->email_pengguna, 'password'=>$request->password])) {
        $dinas = Dinas_pengguna::where('email_pengguna',$request->email_pengguna)->get();
        $nama = $dinas[0]->nama_pengguna;
        // return $nama;
        Auth::guard('dinas_pengguna')->LoginUsingId($dinas[0]['id']);
        Alert::success('Halo '.$nama.' Petugas Dinas Kesehatan', 'Selamat Datang');
        return redirect ('/relawan/index');
      } else if(Auth::guard('relawan_pengguna')->attempt(['email_pengguna' =>$request->email_pengguna,'password'=>$request->password])) {
        $relawan = Relawan_pengguna::where('email_pengguna',$request->email_pengguna)->get();
        $nama = $relawan[0]->nama_pengguna;
        Auth::guard('relawan_pengguna')->LoginUsingId($relawan[0]['id']);
        Alert::success('Halo '.$nama.' Orasng Hebat', 'Selamat Datang');
        return redirect('/user/pesan');

      } else {

        Alert::error('Email dan password anda tidak sesuai atau Anda belum diverifikasi', 'Login Gagal')->persistent("Tutup");
        return redirect()->back()->withInput($request->only('email_pengguna'));
      }

    }

    function logout() {
      if(Auth::guard('dinas_pengguna')->check()) {
        Auth::guard('dinas_pengguna')->logout(); //Jika berhasil coba hanya gunakan Auth::logout() saja
      } else if (Auth::guard('relawan_pengguna')->check()) {
        Auth::guard('relawan_pengguna')->logout();
      }
      Alert::success('Terima Kasih atas kerja keras Anda hari ini', 'Berhasil Keluar');
      return redirect('/');
    }

}
