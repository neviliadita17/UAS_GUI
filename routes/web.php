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
    return view('/welcome');
});

//Login,Register,Logout Pasien
Route::get('/pasien/login', 'AuthC@login');
Route::post('/pasien/login/action', 'AuthC@loginAction');
Route::get('/pasien/register', 'AuthC@register');
Route::post('/pasien/register/action', 'AuthC@registerAction');
// Route::get('/pasien/logout', 'AuthC@logout');

// //Login, Register, Logout Pegawai
Route::get('/pegawai/login', 'AuthC@loginPegawai');
Route::post('/pegawai/login/action', 'AuthC@loginPegawaiAction');
// Route::get('/pegawai/logout', 'AuthC@Pegawailogout');


//------------------------ PEGAWAI ------------------------//

//Data Akun Pasien
Route::get('/pegawai/akun-pasien', 'AkunPasienC@akunPasien');
Route::get('pegawai/akun-pasien/data-api', 'AkunPasienC@dataAPI');
// Register Pasien from Pegawai
Route::get('pegawai/akun-pasien/form-register', 'RegPasienC@formRegister');
Route::post('pegawai/akun-pasien/form-register/action', 'RegPasienC@registerAction');
// Antrian
Route::get('pegawai/antrian', 'DataAntrianC@antrian');


//Poli Manajemen
Route::get('/pegawai/poli', 'PoliManajemenC@index');
Route::get('/pegawai/poli/add', 'PoliManajemenC@poliAdd');
Route::post('/pegawai/poli/add/action', 'PoliManajemenC@poliAddAction');
Route::get('/pegawai/poli/edit/{id}', 'PoliManajemenC@poliEdit');
Route::post('/pegawai/poli/edit/action', 'PoliManajemenC@poliEditAction');

