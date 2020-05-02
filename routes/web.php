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
    return view('welcome');
});

Route::get('/pegawai/login', 'LoginPegC@login');

// Akun Pasien
Route::get('pegawai/akun-pasien', 'AkunPasienC@akunPasien');
Route::get('pegawai/akun-pasien/data-api', 'AkunPasienC@dataAPI');

// Register Pasien from Pegawai
Route::get('pegawai/akun-pasien/form-register', 'RegPasienC@formRegister');
Route::post('pegawai/akun-pasien/form-register/action', 'RegPasienC@registerAction');
