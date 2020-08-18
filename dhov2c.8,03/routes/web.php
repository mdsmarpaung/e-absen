<?php

use Illuminate\Support\Facades\Route;

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
    return view('peserta.index');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->middleware('guest');


// Route::get('/peserta', 'AudiencesController@index');

// Route::get('/operator', 'MeetingsController@index');
// Route::post('/operator', 'MeetingsController@store');
// Route::delete('/operator/drapat/{meeting}', 'MeetingsController@destroy');
// Route::get('/operator/drapat/erapat', 'MeetingsController@edit');

// Route::get('/peserta', 'AudiencesController@index');
Route::get('/peserta/form', 'AudiencesController@show');
Route::post('/peserta/form', 'AudiencesController@store');
Route::get('/penutup', 'AudiencesController@index_akhir');


// Operator {
Route::get('/operator', 'MeetingsController@index')->middleware('auth:operator');
Route::post('/operator', 'MeetingsController@store');


Route::get('/operator/drapat/{meeting}', 'MeetingsController@show')->middleware('auth:operator');
Route::put('/operator/drapat/{meeting}', 'MeetingsController@update_stat_mulai')->middleware('auth:operator');
Route::get('/operator/drapat/erapat/{meeting}', 'MeetingsController@edit')->middleware('auth:operator');
Route::patch('/operator/drapat/erapat/{meeting}', 'MeetingsController@update')->middleware('auth:operator');
Route::put('/operator/drapat/batal/{meeting}', 'MeetingsController@update_stat_batal')->middleware('auth:operator');


Route::get('/operator/dbrapat/{meeting}', 'MeetingsController@show_dbrapat')->middleware('auth:operator');
Route::patch('/operator/dbrapat/{meeting}', 'PhotosController@store')->middleware('auth:operator');
Route::put('/operator/dbrapat/{meeting}', 'MeetingsController@update_stat_selesai')->middleware('auth:operator');
Route::delete('/operator/dbrapat/{photo}/foto', 'PhotosController@destroy')->middleware('auth:operator');
Route::delete('/operator/dbrapat/{audience}/audience', 'AudiencesController@destroy')->middleware('auth:operator');

Route::get('/operator/drrapat/{meeting}', 'MeetingsController@show_drrapat')->middleware('auth:operator');
Route::put('/operator/drrapat/{meeting}', 'NotulensController@store')->middleware('auth:operator');
Route::get('/operator/drrapat/{meeting}/notulen', 'NotulensController@show')->middleware('auth:operator');
Route::get('/operator/drrapat/{notulen}/download', 'NotulensController@download_file')->middleware('auth:operator');
// Route::delete('/operator/drrapat/{notulen}/notulen', 'NotulensController@destroy')->middleware('auth:operator');

Route::get('/operator/eprofil/{meeting}', 'MeetingsController@edit_profil')->middleware('auth:operator');
Route::get('/operator/eprofil/{meeting}/eprofil2', 'MeetingsController@edit_profil2')->middleware('auth:operator');
Route::patch('/operator/eprofil/{meeting}', 'MeetingsController@update_profil')->middleware('auth:operator');
Route::get('/operator/eprofil/{meeting}/epassword', 'MeetingsController@edit_epassword')->middleware('auth:operator');
Route::put('/operator/eprofil/{meeting}', 'MeetingsController@update_password')->middleware('auth:operator');
// }


// Admin {
Route::get('/admin', 'AdminsController@index')->middleware('auth:admin');
Route::post('/admin', 'AdminsController@store')->middleware('auth:admin');

Route::get('/admin/eprofil/{operator}', 'AdminsController@show')->middleware('auth:admin');
Route::delete('/admin/eprofil/{operator}', 'AdminsController@destroy')->middleware('auth:admin');

Route::get('/admin/eprofil/{operator}/eprofil2', 'AdminsController@edit')->middleware('auth:admin');
Route::patch('/admin/eprofil/{operator}', 'AdminsController@update')->middleware('auth:admin');
Route::get('/admin/eprofil/{operator}/epassword', 'AdminsController@edit_password')->middleware('auth:admin');
Route::put('/admin/eprofil/{operator}', 'AdminsController@update_password')->middleware('auth:admin');

Route::get('/admin/opr/{operator}', 'AdminsController@show_opd')->middleware('auth:admin');

Route::post('/admin/meeting', 'AdminsController@store_meeting')->middleware('auth:admin');

Route::get('admin/opr/drapat/{meeting}', 'MeetingsController@show')->middleware('auth:admin')->name('admin_opr');
Route::put('admin/opr/drapat/{meeting}', 'AdminsController@update_stat_mulai')->middleware('auth:admin');

Route::get('admin/opr/dbrapat/{meeting}', 'MeetingsController@show_dbrapat')->middleware('auth:admin');
Route::get('admin/opr/erapat/{meeting}', 'MeetingsController@edit')->middleware('auth:admin');
Route::patch('admin/opr/erapat/{meeting}', 'AdminsController@update_rapat')->middleware('auth:admin');
Route::put('/admin/opr/drapat/batal/{meeting}', 'AdminsController@update_stat_batal')->middleware('auth:admin');

Route::patch('/admin/opr/dbrapat/{meeting}', 'PhotosController@store')->middleware('auth:admin');
Route::delete('/admin/opr/dbrapat/{photo}/foto', 'PhotosController@destroy')->middleware('auth:admin');
Route::put('/admin/opr/dbrapat/{meeting}', 'AdminsController@update_stat_selesai')->middleware('auth:admin');
Route::delete('/admin/opr/dbrapat/{photo}', 'PhotosController@destroy')->middleware('auth:admin');

Route::get('/admin/opr/drrapat/{meeting}', 'MeetingsController@show_drrapat')->middleware('auth:admin');
Route::put('/admin/opr/drrapat/{meeting}', 'NotulensController@store')->middleware('auth:admin');
Route::get('/admin/opr/drrapat/{meeting}/notulen', 'NotulensController@show')->middleware('auth:admin');
Route::get('/admin/opr/drrapat/{notulen}/download', 'NotulensController@download_file')->middleware('auth:admin');
// }

Route::get('/operator/drrapat/{meeting}/cetak', 'NotulensController@cetak_pdf');
Route::get('/admin/opr/drrapat/{meeting}/cetak', 'NotulensController@cetak_pdf');

Route::post('/kirimdata', 'login@masuk');
Route::get('/keluar', 'login@keluar');

Route::get('/tes123', 'CobaController@tes');
