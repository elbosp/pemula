<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relawan;
use App\Relawan_pengguna;
use App\Helpers\Geocoder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Alert;

class RelawanController extends Controller
{
  public function create(){
    return view('login.register');
  }

  public function store(Request $request){
    $alamat_kelurahan = strtolower($request->get('kelurahan'));
    $kelurahan = ucwords($alamat_kelurahan);
    $alamat_kecamatan = strtolower($request->get('kecamatan'));
    $kecamatan = ucwords($alamat_kecamatan);
    $alamat_kabupaten = strtolower($request->get('kabupaten'));
    $kabupaten = ucwords($alamat_kabupaten);
    $alamat_provinsi = strtolower($request->get('provinsi'));
    $provinsi = ucwords($alamat_provinsi);
    $alamat_lengkap = $kelurahan . ', ' . $kecamatan . ', ' . $kabupaten . ', ' . $provinsi;

    $status = "Belum Diverivikasi";

    $lnglat = Geocoder::addressToLongLat($alamat_lengkap);
    $long = $lnglat['latitude'];
    $lat = $lnglat['longitude'];
    $relawan =  new Relawan;
    request()->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $imageName = $request->file('image');
    if ($imageName!=null) {
      $extension = $imageName->getClientOriginalExtension();
      request()->image->move(public_path('images'), $imageName->getClientOriginalName());
      $relawan->mime = $imageName->getClientMimeType();
      $relawan->original_filename = $imageName->getClientOriginalName();
      $relawan->filename = $imageName->getFilename().'.'.$extension;
    }
    $relawan->id_relawan = $request->get('id_relawan');
    $relawan->email_relawan = $request->get('email_relawan');
    $relawan->nama_relawan = $request->get('nama_relawan');
    $relawan->status_relawan = $status;
    $relawan->longitude_relawan = $long;
    $relawan->latitude_relawan = $lat;
    $relawan->keahlian = $request->get('keahlian');
    $relawan->alamat_kelurahan_relawan = $kelurahan;
    $relawan->alamat_kecamatan_relawan = $kecamatan;
    $relawan->alamat_kabupaten_relawan = $kabupaten;
    $relawan->alamat_lengkap_relawan = $alamat_lengkap;
    $relawan->alamat_provinsi_relawan = $provinsi;
    $relawan->password = Hash::make($request->get('password'));
    $relawan->save();
    Alert::success('Silahkan menunggu konfirmasi dinas kesehatan melalui email Anda ', 'Pendaftaran Berhasil')->persistent("Tutup");
    return redirect('/');
  }

  public function update(Request $request, $primaryKey){
    $alamat_kelurahan = strtolower($request->get('kelurahan'));
    $kelurahan = ucwords($alamat_kelurahan);
    $alamat_kecamatan = strtolower($request->get('kecamatan'));
    $kecamatan = ucwords($alamat_kecamatan);
    $alamat_kabupaten = strtolower($request->get('kabupaten'));
    $kabupaten = ucwords($alamat_kabupaten);
    $alamat_provinsi = strtolower($request->get('provinsi'));
    $provinsi = ucwords($alamat_provinsi);
    $alamat_lengkap = $kelurahan . ', ' . $kecamatan . ', ' . $kabupaten . ', ' . $provinsi;

    $lnglat = Geocoder::addressToLongLat($alamat_lengkap);
    $long = $lnglat['latitude'];
    $lat = $lnglat['longitude'];

    $relawan = Relawan::find($primaryKey);
    // request()->validate([
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);
    // $imageName = $request->file('image');
    // $extension = $imageName->getClientOriginalExtension();
    // request()->image->move(public_path('images'), $imageName->getClientOriginalName());
    // // Storage::disk('public')->put($imageName->getFilename().'.'.$extension, File::get($imageName));
    // $relawan->mime = $imageName->getClientMimeType();
    // $relawan->original_filename = $imageName->getClientOriginalName();
    // $relawan->filename = $imageName->getFilename().'.'.$extension;
    // $relawan->id_relawan = $request->get('id_relawan');
    $relawan->status_relawan = $request->status_relawan;
    $relawan->email_relawan = $request->get('email_relawan');
    $relawan->nama_relawan = $request->get('nama_relawan');
    $relawan->status_relawan = $request->get('status_relawan');
    $relawan->longitude_relawan = $long;
    $relawan->latitude_relawan = $lat;
    $relawan->keahlian = $request->get('keahlian');
    $relawan->alamat_kelurahan_relawan = $kelurahan;
    $relawan->alamat_kecamatan_relawan = $kecamatan;
    $relawan->alamat_kabupaten_relawan = $kabupaten;
    $relawan->alamat_provinsi_relawan = $provinsi;
    $relawan->alamat_lengkap_relawan = $alamat_lengkap;
    $relawan->save();
    Alert::success('Data berhasil di update', 'Pembaharuan Berhasil');
    return redirect('relawan/index');
  }

  public function edit($primaryKey){
    $relawan = Relawan::find($primaryKey);
    return view('content_dinas.relawan.edit',compact('relawan'));
  }

  public function destroy($primaryKey){
    $getRelawanVerif = Relawan::where('id_relawan', $primaryKey)->get();
    $verif = $getRelawanVerif[0]->status_relawan;
    // return $verif;
    if($verif=="Verifikasi") {
        $user = Relawan_pengguna::where('email_pengguna', $getRelawanVerif[0]->email_relawan)->delete();
    }
    $relawan = Relawan::where('id_relawan', $primaryKey)->delete();
    Alert::success('Relawan berhasil dihapus', 'Penghapusan Berhasil');
    return redirect('relawan/index');
  }

  public function index()
  {
      // $relawan = Relawan::all();
      $relawan = Relawan::orderBy('created_at', 'desc')->get();

      return view('content_dinas.relawan.index',compact('relawan'));
  }

  public function show($primaryKey)
  {
    $relawan = Relawan::find($primaryKey);
    return view('content_dinas.relawan.show')->with('relawan', $relawan);
  }

  public function verifikasi($primaryKey) {
    $relawan = Relawan::find($primaryKey);
    if($relawan->status_relawan=="Verifikasi") {
      return redirect('relawan/index');
    } else {
      $user = new Relawan_pengguna;
      $user->nama_pengguna = $relawan->nama_relawan;
      $user->password = $relawan->password;
      $user->email_pengguna = $relawan->email_relawan;
      $relawan->status_relawan = "Verifikasi";
      $relawan->save();
      $user->save();
      Alert::success('Relawan berhasil Diverifikasi', 'Verifikasi Berhasil');
      return redirect('relawan/index');
    }
  }
  public function pesanDinas() {
    return view('content_relawan.pesan.index');
  }
  public function arahanDinas() {
    return view('content_relawan.arahan.index');
  }
  public function chat() {
    return view('content_relawan.chat-tim.index');
  }
}
