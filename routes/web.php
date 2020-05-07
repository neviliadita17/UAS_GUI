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


//Login,Register,Logout Pasien
Route::get('/pasien/login', 'AuthC@login');
Route::post('/pasien/login/action', 'AuthC@loginAction');
Route::get('/pasien/register', 'AuthC@register');
Route::post('/pasien/register/action', 'AuthC@registerAction');
// Route::get('/pasien/logout', 'AuthC@logout');

//Home Pasien
// Route::get('/pasien/home', 'PasienC@index');
Route::get('/', 'PasienC@index');
Route::get('/pasien/home-api', 'PasienC@dataPoliApi');
Route::get('/pasien/detail-poli/{id}', 'PasienC@detailPoli');
Route::get('/detail', 'PasienC@showDetail');


// Antrian
Route::post('/pasien/daftar-antrian', 'PasienC@daftarAntrian');
Route::get('/pasien/antrian-api', 'PasienC@dataAntrianAPI');
Route::get('/pasien/antrian', 'PasienC@antrian');
Route::post('/pasien/delete-antrian', 'PasienC@deleteAntrian');
Route::post('/pasien/konfirmasi-antrian', 'PasienC@konfirmasiAntrian');

// Riwayat
Route::get('/pasien/riwayat-api', 'PasienC@dataRiwayatAPI');
Route::get('/pasien/riwayat-antrian', 'PasienC@riwayat');


//Halaman Poli Pasien
Route::get('/pasien/poli', 'PasienC@poliIndex');


//------------------------ PEGAWAI ------------------------//

//Login Pegawai
// //Login, Register, Logout Pegawai
Route::get('/pegawai/login', 'AuthC@loginPegawai');
Route::post('/pegawai/login/action', 'AuthC@loginPegawaiAction');
Route::get('/pegawai/logout', 'AuthC@logout');

// Home Pegawai
Route::get('/pegawai/home', 'PegawaiC@index');
Route::get('/pegawai/pasien-api', 'PegawaiC@jumlahPasienAPI');
Route::get('/pegawai/poli-api', 'PegawaiC@jumlahPoliAPI');
Route::get('/pegawai/antrian-api', 'PegawaiC@jumlahAntrianAPI');

//Data Akun Pasien
Route::get('/pegawai/akun-pasien', 'AkunPasienC@akunPasien');
Route::get('pegawai/akun-pasien/data-api', 'AkunPasienC@dataAPI');
// Register Pasien from Pegawai
Route::get('pegawai/akun-pasien/form-register', 'AkunPasienC@formRegister');
Route::post('pegawai/akun-pasien/form-register/action', 'AkunPasienC@registerAction');
Route::get('/pegawai/akun-pasien/edit/{id}', 'AkunPasienC@editDataPasien');
Route::post('/pegawai/akun-pasien/edit/action', 'AkunPasienC@editDataPasienAction');


// Antrian
Route::get('pegawai/antrian', 'DataAntrianC@index');
Route::get('pegawai/antrian/data-api', 'DataAntrianC@dataAPIPasien');
Route::get('/pegawai/antrian/add/{id}', 'DataAntrianC@dataAntrianAdd');
Route::post('/pegawai/antrian/add/action', 'DataAntrianC@dataAntrianAddAction');


//Poli Manajemen
Route::get('/pegawai/poli', 'PoliManajemenC@index');
Route::get('/pegawai/poli/data-api', 'PoliManajemenC@poliAPI');
Route::get('/pegawai/poli/add', 'PoliManajemenC@poliAdd');
Route::post('/pegawai/poli/add/action', 'PoliManajemenC@poliAddAction');
Route::get('/pegawai/poli/edit/{id}', 'PoliManajemenC@poliEdit');
Route::post('/pegawai/poli/edit/action', 'PoliManajemenC@poliEditAction');
