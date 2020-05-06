<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posko;
use App\Helpers\Geocoder;
use Alert;

class PoskoController extends Controller
{
  public function create(){
    return view('content_dinas.posko.create');
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

    $lnglat = Geocoder::addressToLongLat($alamat_lengkap);
    $long = $lnglat['latitude'];
    $lat = $lnglat['longitude'];

    $posko = new Posko;
    $posko->nama_posko = $request->get('nama_posko');
    $posko->nama_bencana = $request->get('nama_bencana');
    $posko->waktu_bencana = $request->get('waktu_bencana');
    $posko->latitude_posko = $long;
    $posko->longitude_posko = $lat;
    // $posko->alamat_jalan_posko = $request->get('alamat_jalan_posko');
    $posko->alamat_kelurahan_posko =$kelurahan;
    $posko->alamat_kecamatan_posko = $kecamatan;
    $posko->alamat_kabupaten_posko = $kabupaten;
    $posko->alamat_provinsi_posko = $provinsi;
    $posko->alamat_lengkap_posko = $alamat_lengkap;
    Alert::success('Posko berhasil ditambahkan', 'Berhasil Menambahkan');
    $posko->save();
    return redirect('posko/index');
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

    $posko = Posko::find($primaryKey);
    $posko->nama_posko = $request->get('nama_posko');
    $posko->nama_bencana = $request->get('nama_bencana');
    $posko->waktu_bencana = $request->get('waktu_bencana');
    $posko->latitude_posko = $lat;
    $posko->longitude_posko = $long;
    // $posko->alamat_jalan_posko = $request->get('alamat_jalan_posko');
    $posko->alamat_kelurahan_posko =$kelurahan;
    $posko->alamat_kecamatan_posko = $kecamatan;
    $posko->alamat_kabupaten_posko = $kabupaten;
    $posko->alamat_provinsi_posko = $provinsi;
    $posko->alamat_lengkap_posko = $alamat_lengkap;
    Alert::success('Posko berhasil diubah', 'Berhasil Mengubah');
    $posko->save();
    return redirect('posko/index');
  }

  public function edit($primaryKey){
    $posko = Posko::find($primaryKey);
    return view('content_dinas.posko.edit', compact('posko'));
  }

  public function destroy($primaryKey){
    $posko = Posko::where('id_posko', $primaryKey)->delete();
    Alert::success('Posko berhasil dihapus', 'Berhasil Menghapus');
    return redirect('posko/index');
  }

  public function index()
  {
      $posko = Posko::orderBy('created_at', 'desc')->get();
      return view('content_dinas.posko.index',compact('posko'));
  }
}
