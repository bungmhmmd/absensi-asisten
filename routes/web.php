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
Auth::routes();
Route::get('/', 'HomeController@home');
//profile
Route::get('/profile/{user_id}', 'HomeController@profile');
Route::post('/profile/update','HomeController@profileupdate');

//absensi
Route::get('/absensi', 'AbsensiController@index');
route::post('/absensi/masuk/{user_id}','AbsensiController@masuk');
route::post('/absensi/keluar/{user_id}','AbsensiController@keluar');

//laporan
Route::get('/laporan', 'LaporanController@index')
                    ->middleware('is_admin');
Route::post('/laporan/tabel', 'LaporanController@tabel')
                    ->middleware('is_admin');
Route::get('/laporan/tabel/cetak_pdf', 'LaporanController@cetak_pdf')
                    ->middleware('is_admin');



//jadwal
Route::get('/jadwal', 'JadwalController@jadwal');
//insert data ke database
route::get('/jadwal/tambah','JadwalController@tambah');
route::post('/jadwal/store','JadwalController@store');
//edit dan update data pada database
Route::get('/jadwal/edit/{user_id}','JadwalController@edit');
Route::post('/jadwal/update','JadwalController@update');
//menghapus data
Route::get('/jadwal/hapus/{user_id}','JadwalController@hapus');


//tampilkan tabel
route::get('/daftar-asisten','DaftarAsistenController@daftar')
            ->middleware('is_admin');
//edit dan update data pada database
Route::get('/daftar-asisten/edit/{user_id}','DaftarAsistenController@edit')
            ->middleware('is_admin');
Route::post('/daftar-asisten/update','DaftarAsistenController@update')
            ->middleware('is_admin');
//menghapus data
Route::get('/daftar-asisten/hapus/{user_id}','DaftarAsistenController@hapus')
            ->middleware('is_admin');
//membuat pencarian data
Route::get('/daftar-asisten/cari','DaftarAsistenController@cari')
            ->middleware('is_admin');                



