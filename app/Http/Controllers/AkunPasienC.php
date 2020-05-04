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
        $item = DB::select(
            "SELECT id_pasien AS Id, nama_pasien AS 'Nama Pasien', alamat AS Alamat, 
                DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'Tanggal Lahir', n_bpjs AS 'Nomor BPJS', n_rm AS 'Nomor Rekam Medis' FROM tb_pasien",
            []
        );
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

    public function editDataPasien($id)
    {
        $tb_pasien = DB::table('tb_pasien')->where('id_pasien', $id)->get();
        return view('pegawai/akun_pasien/akun_pasien_edit', ['tb_pasien' => $tb_pasien]);
    }

    public function editDataPasienAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            if ($request->input('st_bpjs') == "Iya" && $request->input('st_p') == "Lama") {
                DB::table('tb_pasien')->where('id_pasien', $request->id)->update([
                    'id_pasien' => $request->id,
                    'email' => $request->email,
                    'password' => $request->password,
                    'nama_pasien' => $request->nama,
                    'alamat' => $request->alamat,
                    'tgl_lahir' => $request->tgl_lahir,
                    'status_pasien' => $request->st_p,
                    'n_rm' => $request->n_rm,
                    'status_bpjs' => $request->st_bpjs,
                    'n_bpjs' => $request->no_bpjs
                ]);
            } else if ($request->input('st_bpjs') == "Tidak" && $request->input('st_p') == "Lama") {
                DB::table('tb_pasien')->where('id_pasien', $request->id)->update([
                    'id_pasien' => $request->id,
                    'email' => $request->email,
                    'password' => $request->password,
                    'nama_pasien' => $request->nama,
                    'alamat' => $request->alamat,
                    'tgl_lahir' => $request->tgl_lahir,
                    'status_pasien' => $request->st_p,
                    'n_rm' => $request->n_rm,
                    'status_bpjs' => $request->st_bpjs,
                    'n_bpjs' => "Tidak Terdaftar Sepagai Pasien BPJS"
                ]);
            } else {
                DB::table('tb_pasien')->where('id_pasien', $request->id)->update([
                    'id_pasien' => $request->id,
                    'email' => $request->email,
                    'password' => $request->password,
                    'nama_pasien' => $request->nama,
                    'alamat' => $request->alamat,
                    'tgl_lahir' => $request->tgl_lahir,
                    'status_pasien' => $request->st_p,
                    'n_rm' => "Nomor Rekam Medis Belum Terdaftar",
                    'status_bpjs' => $request->st_bpjs,
                    'n_bpjs' => $request->no_bpjs
                ]);
            }
            return redirect('/pegawai/akun-pasien');
        } else {
            return redirect('/pegawai/akun-pasien/edit/{id}');
        }
    }
}
