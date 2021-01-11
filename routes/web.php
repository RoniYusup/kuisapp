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
#menggunakan controler#
Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

Auth::routes(['register' => false]);
//controler siswa 
Route::get('siswa/cari', 'SiswaController@cari');
Route::resource('siswa', 'SiswaController');
//dosen

Route::get('dosen', 'DosenController@index');

Route::get('dosen/create', 'DosenController@create');

Route::get('dosen/{dosen}', 'DosenController@show');

Route::post('dosen', 'DosenController@store');

Route::get('dosen/{dosen}/edit', 'DosenController@edit');

Route::patch('dosen/{dosen}', 'DosenController@update');

Route::delete('dosen/{dosen}', 'DosenController@destroy');

//matakuliah


Route::get('matakuliah', 'MatakuliahController@index');

Route::get('matakuliah/create', 'MatakuliahController@create');

Route::get('matakuliah/{matakuliah}', 'MatakuliahController@show');

Route::post('matakuliah', 'MatakuliahController@store');

Route::get('matakuliah/{matakuliah}/edit', 'MatakuliahController@edit');

Route::patch('matakuliah/{matakuliah}', 'MatakuliahController@update');

Route::delete('matakuliah/{matakuliah}', 'MatakuliahController@destroy');

//soal
Route::resource('soal','SoalController');
//Buat soal
Route::get('createSoal/{idK}', ['uses'=>'SoalController@createSoal']);
//Hapus Soal 
Route::get('hapusSoal', ['uses'=>'SoalController@hapusSoal']);

//kuis
Route::resource('kuis','KuisController');

//Kuis
	Route::get('getKuis',['uses'=>'StudiController@kuis']);
	Route::get('viewKuis/{idKuis}',['uses'=>'StudiController@viewKuis']);

	Route::post('postAnswer',['uses'=>'StudiController@postAnswer']);
	Route::post('finishKuis',['uses'=>'StudiController@finishKuis']);


//Hapus kuis
	Route::get('hapusKuis', ['uses'=>'KuisController@hapusKuis']);


//studi
Route::resource('studi','StudiController');

Route::resource('user', 'UserController');





