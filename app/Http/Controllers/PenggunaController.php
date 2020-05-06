<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;

class PenggunaController extends Controller
{
  public function create(){
    return view('pengguna.create');
  }

  public function store(Request $request){
    $pengguna = new Pengguna;
    $pengguna->username = $request->get('username');
    $pengguna->password = $request->get('password');
    $pengguna->evaluasi_kerja = $request->get('evaluasi_kerja');
    $pengguna->save();
    return redirect('pengguna')->with('success', 'Information has been added');
  }

  public function update(Request $request, $primaryKey){
    $pengguna = Pengguna::find($primaryKey);
    $pengguna->username = $request->get('username');
    $pengguna->password = $request->get('password');
    $pengguna->evaluasi_kerja = $request->get('evaluasi_kerja');
    $pengguna->save();
    return redirect('pengguna');
  }

  public function edit($primaryKey){
    $pengguna = Pengguna::find($primaryKey);
    return view('pengguna.edit',compact('pengguna'));
  }

  public function destroy($primaryKey){
    $pengguna = Pengguna::where('id_pengguna', $primaryKey)->delete();
    return redirect('pengguna')->with('success','information has been deleted');
  }

  public function index()
  {
      $pengguna = Pengguna::all();
      return view('pengguna.index',compact('pengguna'));
  }
  public function show($id_pengguna) {

  }
}
