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
    return view('frontend.landingpage ');
});

Route::get('home','frontend\HomeController@index');
Route::get('page','frontend\PageController@index');
// Route::get('cekdps','frontend\CekDptController@index');
Route::get('cekdps',['as' => 'cekdps', 'uses' => 'frontend\CekDptController@index']);

Route::get('sejarahkpu','frontend\SejarahkpuController@index');
Route::get('kontak','frontend\KontakController@index');
Route::get('dokumen','frontend\DokumenController@index');

Route::get('list_berita','frontend\BeritaController@index');
Route::get('/detail_berita/{id}', [
  'uses' => 'frontend\BeritaController@detail',
  'as'   => 'detail_berita'
]);

Route::get('list_artikel','frontend\ArtikelController@index');
Route::get('/detail_artikel/{id}', [
  'uses' => 'frontend\ArtikelController@detail',
  'as'   => 'detail_artikel'
]);

Route::get('/detail_pengumuman/{id}', [
  'uses' => 'frontend\PengumumanController@detail',
  'as'   => 'detail_pengumuman'
]);


Route::get('hukum','frontend\HukumController@index');
Route::get('list_pengumuman','frontend\PengumumanController@index');
Route::get('profile_anggota','frontend\ProfileAnggotaController@index');
Route::get('profile_seketariat','frontend\ProfileSeketariatController@index');
Route::get('visi_misi','frontend\VisiMisiController@index');


// Route::post('cekdpt', 'frontend\CekDptController@checkList');
// Route::post('cekdpt', 'frontend\CekDptController@checkList');
Route::post('cekdps', ['as'=>'cari','uses'=>'frontend\CekDptController@checkList']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
