<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tim;
use App\Posko;
use App\Relawan;
use JavaScript;
use Response;
use Alert;

class TimController extends Controller
{
  public function create(){
    $posko = Posko::all();
    $relawan = Relawan::where('status_relawan', 'verifikasi')->get();
    JavaScript::put([
        'rel' => $relawan,
        'nama' => Auth::user()->nama_pengguna
    ]);
    return view('content_dinas.tim.create',compact('posko', 'relawan'));
  }

  public function store(Request $request){
    $tim = new Tim;
    $tim->nama_tim = $request->get('nama_tim');
    $tim->peran_tim = $request->get('peran_tim');
    $tim->ketua_tim = $request->get('ketua_tim');
    $tim->posko_id = $request->get('posko');
    $tim->save();
    $relawan = Relawan::find($tim->ketua_tim);
    $relawan->tim_id = $tim->id_tim;
    $relawan->save();
    $anggotaTim = $request->get('anggota_tim');
    for ($i=0; $i<count($anggotaTim); $i++) {
      $relawan = Relawan::find($anggotaTim[$i]);
      $relawan->tim_id = $tim->id_tim;
      $relawan->save();
    }
    Alert::success('Tim berhasil ditambahkan', 'Berhasil Menambahkan');
    return redirect('tim/index');
  }

  public function update(Request $request, $primaryKey){
    $tim = Tim::find($primaryKey);
    $tim->nama_tim = $request->get('nama_tim');
    $tim->peran_tim = $request->get('peran_tim');
    // $tim->anggota_tim = $request->get('anggota_tim');
    // $tim->ketua_tim = $request->get('ketua_tim');
    // return $request->get('posko');
    $tim->posko_id = $request->get('posko');
    Alert::success('Tim berhasil diubah', 'Berhasil Mengubah');
    $tim->save();
    return redirect('tim/index');
  }

  public function edit($primaryKey){
    $tim = Tim::find($primaryKey);
    $posko = Posko::all();
    return view('content_dinas.tim.edit',compact('tim', 'posko'));
  }

  public function destroy($primaryKey){
    $tim = Tim::where('id_tim', $primaryKey)->delete();
    Alert::success('Tim berhasil dihapus', 'Berhasil Menghapus');
    return redirect('tim/index');
  }

  public function index()
  {
      // $tim = Tim::all();
      $tim = Tim::orderBy('created_at', 'desc')->get();
      return view('content_dinas.tim.index',compact('tim'));
  }

  public function show($primaryKey)
  {
    $tim = Tim::find($primaryKey);
    JavaScript::put([
        'nama' => Auth::user()->nama_pengguna,
        'tim' => $tim->nama_tim
    ]);
    return view ('content_dinas.tim.show');
  }

  public function showDetail($primaryKey)
  {
    $tim = Tim::find($primaryKey);
    $ketua = $tim->ketua_tim;
    $namaKetua = Relawan::find($ketua);
    // return $tim->relawan;
    return view ('content_dinas.tim.anggota-tim')->with('relawan', $tim->relawan)->with('tim',$tim)->with('ketuaTim', $namaKetua);
  }
}
