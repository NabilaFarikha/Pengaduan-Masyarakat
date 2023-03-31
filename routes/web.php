<?php
use App\Http\Controllers\IndoregionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

//login&regis
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/simpanregister','LoginController@simpanregister')->name('simpanregister');
Route::post('/simpanregister','LoginController@simpanregister')->name('simpanregister');

Route::post('/getkabupaten', 'LoginController@getkabupaten')->name('getkabupaten');
Route::post('/getkecamatan', 'LoginController@getkecamatan')->name('getkecamatan');
Route::post('/getdesa', 'LoginController@getdesa')->name('getdesa');
Route::post('/getkbptn', 'PetugasController@getkbptn')->name('getkbptn');
Route::post('/getkcmtn', 'PetugasController@getkcmtn')->name('getkcmtn');
Route::post('/getds', 'PetugasController@getds')->name('getds');

Route::group(['middleware'=> ['auth','ceklevel:admin,petugas']], function(){
Route::get('/dashboard','DashboardController@index')->name('dashboard');
//pengaduan
Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
// Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit');
Route::get('/pengaduan/show/{id}', 'PengaduanController@show');
Route::put('/pengaduan/update/{id}', 'PengaduanController@update');
Route::get('/pengaduan/destroy/{id}', 'PengaduanController@destroy');
Route::post('/pengaduan/show/onchange/{id}', 'PengaduanController@statusOnchange')->name('pengaduan.statusOnchange');
Route::post('/pengaduan/show/{id}', 'PengaduanController@store');
Route::get('/pengaduan/destroy/{id}', 'PengaduanController@destroy');   
Route::post('/pengaduan/show/{id}', 'TanggapanController@store');   
Route::get('/petugas', 'PetugasController@index')->name('petugas');
Route::get('/petugas/create', 'PetugasController@create');
Route::post('/petugas/store', 'PetugasController@store');   
Route::get('/petugas/show/{id}', 'PetugasController@show');
Route::get('/petugas/destroy/{id}', 'PetugasController@destroy');
Route::get('/petugas/cetak/pdf', 'PetugasController@pdf');
});

Route::group(['middleware'=> ['auth','ceklevel:admin,petugas']], function(){
Route::get('/petugas', 'PetugasController@index')->name('petugas');
Route::get('/petugas/create', 'PetugasController@create');
Route::post('/petugas/store', 'PetugasController@store');   
Route::get('/petugas/show/{id}', 'PetugasController@show');
Route::get('/petugas/destroy/{id}', 'PetugasController@destroy');
Route::get('/petugas/cetak/pdf', 'PetugasController@pdf');
});

Route::group(['middleware'=> ['auth','ceklevel:masyarakat']], function(){
Route::get('/masyarakat','DashboardController@masyarakat')->name('masyarakat');
Route::get('/pengaduan/create', 'PengaduanController@create');
Route::post('/pengaduan/store', 'PengaduanController@store');
Route::get('/laporanku','DashboardController@laporanku');
Route::get('/detailLaporan/{id}', 'DashboardController@detailLaporan');
});

Route::get('/user_profile', 'UserController@index')->name('user_profile');
Route::get('/user_profile', 'UserprofileController@index')->name('user_profile');
Route::post('getKota', 'UserprofileController@getKota')->name('getKota');//getkota
Route::post('getKecamatan', 'UserprofileController@getKecamatan')->name('getKecamatan');//getkemacatan
Route::post('getKelurahan', 'UserprofileController@getKelurahan')->name('getKelurahan');//getkelurahan

Route::get('/user/{id}', 'UserprofileController@index')->name('user');
Route::get('/petugas/{id}', 'UserprofileController@petugas')->name('petugas');
