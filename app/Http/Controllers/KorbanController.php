<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korban;

class KorbanController extends Controller
{
    public function create(){
      return view('content_dinas.korban.create');
    }

    public function store(Request $request){
      $korban = new Korban;
      $korban->id_korban = $request->get('id_korban');
      $korban->status_korban = $request->get('status_korban');
      $korban->nama_korban = $request->get('nama_korban');
      $korban->save();
      return redirect('korban/index')->with('success', 'Information has been added');
    }

    public function update(Request $request, $primaryKey){
      $korban = Korban::find($primaryKey);
      $korban->status_korban = $request->get('status_korban');
      $korban->nama_korban = $request->get('nama_korban');
      $korban->save();
      return redirect('korban/index')->with('success', 'Data telah berhasil di Update');
    }

    public function edit($primaryKey){
      $korban = Korban::find($primaryKey);
      return view('content_dinas.korban.edit',compact('korban'));
    }

    public function destroy($primaryKey){
      $korban = Korban::where('id_korban', $primaryKey)->delete();
      return redirect('korban')->with('success','information has been deleted');
    }

    public function index()
    {
        $korban = Korban::all();
        return view('content_dinas.korban.index', compact('korban'));
    }
}
