<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/detil', function () {
    return view('Detil.Relawan');
});
Route::get('/masuk', function () {
    return view('login.masuk');
});

Route::get('/data/relawan', function() {
  return view('Detil.Relawan');
})->name('data.relawan')->middleware('auth:dinas_pengguna');

Route::get('/evaluasi', 'EvaluasiController@index')->name('evaluasi')->middleware('auth:dinas_pengguna');
Route::get('/evaluasi2', 'EvaluasiController@index2')->name('evaluasi2')->middleware('auth:dinas_pengguna');

//Route ini digunakan untuk antisipasi ketika relawan ingin mengakses dinas atau sebaliknya
Route::get('/back', function() {
  return redirect()->back();
})->name('login');

//Prefix User digunakan untuk mengakses semua kebutuhan di dashboard Relawan
Route::prefix('user')->group(function() {
  Route::get('/arahan', 'RelawanController@arahanDinas')->name('user.arahan')->middleware('auth:relawan_pengguna');
  Route::get('/chat-tim', 'RelawanController@chat')->name('user.chat-tim')->middleware('auth:relawan_pengguna');
  Route::get('/pesan', 'RelawanController@pesanDinas')->name('user.pesan')->middleware('auth:relawan_pengguna');
});

//prefix korban berisi route yang berkaitan dengan korban. Untuk implementasi, jika command url gunakan (prefix/...) jika command route gunakan name, jika command redirect gunakan url
Route::prefix('korban')->group(function() {
  Route::get('/create', 'KorbanController@create')->name('korban.create')->middleware('auth:dinas_pengguna');
  Route::post('/store', 'KorbanController@store')->name('korban.store')->middleware('auth:dinas_pengguna');
  Route::get('/index', 'KorbanController@index')->name('korban.index')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/edit', 'KorbanController@edit')->name('korban.edit')->middleware('auth:dinas_pengguna');
  Route::delete('/{id}', 'KorbanController@destroy')->name('korban.destroy')->middleware('auth:dinas_pengguna');
  Route::patch('/{id}', 'KorbanController@update')->name('korban.update')->middleware('auth:dinas_pengguna');
});

//prefix posko berisi route yang berkaitan dengan posko. Untuk implementasi, jika command url gunakan (prefix/...) jika command route gunakan name, jika command redirect gunakan url
Route::prefix('posko')->group(function() {
  Route::get('/create', 'PoskoController@create')->name('posko.create')->middleware('auth:dinas_pengguna');
  Route::post('/store', 'PoskoController@store')->name('posko.store')->middleware('auth:dinas_pengguna');
  Route::get('/index', 'PoskoController@index')->name('posko.index')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/edit', 'PoskoController@edit')->name('posko.edit')->middleware('auth:dinas_pengguna');
  Route::delete('/{id}', 'PoskoController@destroy')->name('posko.destroy')->middleware('auth:dinas_pengguna');
  Route::patch('/{id}', 'PoskoController@update')->name('posko.update')->middleware('auth:dinas_pengguna');
});

//create relawan akan di arahkan ke register karena data relawan hanya bisa bertambah berdasarkan data yang register
//Prefix relawan digunakan sebagai url atas fungsionalitas dinas terhadap pengolaan relawan
Route::prefix('relawan')->group(function() {
  Route::get('/index', 'RelawanController@index')->name('relawan.index')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/edit', 'RelawanController@edit')->name('relawan.edit')->middleware('auth:dinas_pengguna');
  Route::delete('/{id}', 'RelawanController@destroy')->name('relawan.destroy')->middleware('auth:dinas_pengguna');
  Route::patch('/{id}', 'RelawanController@update')->name('relawan.update')->middleware('auth:dinas_pengguna');
  Route::get('/{id}', 'RelawanController@show')->name('relawan.show')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/verif', 'RelawanController@verifikasi')->name('relawan.verif')->middleware('auth:dinas_pengguna');
});

Route::prefix('tim')->group(function() {
  Route::get('/create', 'TimController@create')->name('tim.create')->middleware('auth:dinas_pengguna');
  Route::post('/store', 'TimController@store')->name('tim.store')->middleware('auth:dinas_pengguna');
  Route::get('/index', 'TimController@index')->name('tim.index')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/edit', 'TimController@edit')->name('tim.edit')->middleware('auth:dinas_pengguna');
  Route::delete('/{id}', 'TimController@destroy')->name('tim.destroy')->middleware('auth:dinas_pengguna');
  Route::patch('/{id}', 'TimController@update')->name('tim.update')->middleware('auth:dinas_pengguna');
  Route::get('/{id}', 'TimController@show')->name('tim.show')->middleware('auth:dinas_pengguna');
  Route::get('/{id}/anggota', 'TimController@showDetail')->name('tim.show.detail')->middleware('auth:dinas_pengguna');
  // Route::get()
});

//prefix akun diigunakan untuk proses registrasi
Route::prefix('akun')->group(function() {
  Route::get('/registrasi', 'RelawanController@create')->name('akun.regis')->middleware('guest');
  Route::post('/simpan', 'RelawanController@store')->name('akun.simpan');
  Route::get('/login', 'Auth\LoginController@showLogin')->name('akun.login')->middleware('guest');
  Route::post('/submit', 'Auth\LoginController@login')->name('akun.login.submit');
  Route::get('/logout', 'Auth\LoginController@logout')->name('akun.logout');
});



// Route::prefix('bencana')->group(function() {
//   Route::get('/edit', function() {
//     return view('bencana.edit');
//   })->name('bencana.edit')->middleware('auth:dinas_pengguna'); //name sebagai representasi nama route
//
//   Route::get('/content-bencana', function() {
//     return view('bencana.content_bencana');
//   })->name('bencana.content')->middleware('auth:dinas_pengguna'); //Route:: get -> get ini adalah method yang akan digunakan, get biasanya digunakan untuk menampilkan, sementara post digunakan untuk mengirim data/submit
// });
