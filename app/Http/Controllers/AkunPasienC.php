<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkunPasienC extends Controller
{
    public function akunPasien()
    {
        $item = DB::table('tb_pasien')->get();
        $data['jumlah'] = DB::selectOne("SELECT COUNT(id_pasien) AS j_pasien FROM  tb_pasien");
        return view('pegawai/akun_pasien/akun_pasien', ['item' => $item], $data);
    }

    public function dataAPI()
    {
        $item = DB::select("SELECT nama_pasien AS 'Nama Pasien', alamat AS Alamat, DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'Tanggal Lahir', n_rm AS 'Nomor Rekam Medis', n_bpjs AS 'Nomor BPJS' FROM tb_pasien",[]);
        return response(['data' => $item]);
    }

    public function formRegister()
    {
        return view('pegawai/akun_pasien/register');
    }

    public function registerAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            if ($request->input('st_bpjs') == "Iya" && $request->input('st_p') == "Baru") {
                DB::insert("INSERT INTO tb_pasien (email, password, nama_pasien, alamat, tgl_lahir, status_pasien, n_rm, status_bpjs, n_bpjs) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $request->input('email'),
                    $request->input('password'),
                    $request->input('nama'),
                    $request->input('alamat'),
                    $request->input('tgl_lahir'),
                    $request->input('st_p'),
                    "Nomor Rekam Medis Belum Terdaftar",
                    $request->input('st_bpjs'),
                    $request->input('no_bpjs')
                ]);
            } else if ($request->input('st_bpjs') == "Iya" && $request->input('st_p') == "Lama") {
                DB::insert("INSERT INTO tb_pasien (email, password, nama_pasien, alamat, tgl_lahir, status_pasien, n_rm, status_bpjs, n_bpjs) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $request->input('email'),
                    $request->input('password'),
                    $request->input('nama'),
                    $request->input('alamat'),
                    $request->input('tgl_lahir'),
                    $request->input('st_p'),
                    "Nomor Rekam Medis Sudah Terdaftar",
                    $request->input('st_bpjs'),
                    $request->input('no_bpjs')
                ]);
            } else if ($request->input('st_bpjs') == "Tidak" && $request->input('st_p') == "Lama") {
                DB::insert("INSERT INTO tb_pasien (email, password, nama_pasien, alamat, tgl_lahir, status_pasien, n_rm, status_bpjs, n_bpjs) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $request->input('email'),
                    $request->input('password'),
                    $request->input('nama'),
                    $request->input('alamat'),
                    $request->input('tgl_lahir'),
                    $request->input('st_p'),
                    "Nomor Rekam Medis Sudah Terdaftar",
                    $request->input('st_bpjs'),
                    "Tidak Terdaftar Sepagai Pasien BPJS"
                ]);
            } else {
                DB::insert("INSERT INTO tb_pasien (email, password, nama_pasien, alamat, tgl_lahir, status_pasien, n_rm, status_bpjs, n_bpjs) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $request->input('email'),
                    $request->input('password'),
                    $request->input('nama'),
                    $request->input('alamat'),
                    $request->input('tgl_lahir'),
                    $request->input('st_p'),
                    "Nomor Rekam Medis Belum Terdaftar",
                    $request->input('st_bpjs'),
                    "Tidak Terdaftar Sepagai Pasien BPJS"
                ]);
            }
            return redirect('/pegawai/akun-pasien');
        } else {
            return redirect('/pegawai/akun-pasien/form-register');
        }
    }
}
