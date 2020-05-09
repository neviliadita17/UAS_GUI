<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AuthC extends Controller
{
    public function __construct()
    {
    }

    // LOGIN PASIEN
    public function login()
    {
        $data['title'] = "Login Pasien";
        return view('pasien/login', $data);
    }

    public function loginAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            $result = DB::selectOne("SELECT * FROM tb_pasien WHERE email = ? AND password = ?", [
                $request->input('email'),
                $request->input('password')
            ]);

            if ($result != null) {
                $request->session()->put('s_id_pasien', $result->id_pasien);
                $request->session()->put('s_email', $result->email);
                $request->session()->put('s_nama_pasien', $result->nama_pasien);
                $request->session()->put('s_alamat', $result->alamat);
                $request->session()->put('s_tgl_lahir', $result->tgl_lahir);
                $request->session()->put('s_status_pasien', $result->status_pasien);
                $request->session()->put('s_n_rm', $result->n_rm);
                $request->session()->put('s_status_bpjs', $result->status_bpjs);
                $request->session()->put('s_n_bpjs', $result->n_bpjs);
                $request->session()->put('s_password', $result->password);

                return redirect('/');
            } else {
                return redirect('/pasien/login')->with('error', 'Email atau Password salah,harap masukkan ulang!');
            }
        } else {
            return redirect('/pasien/login');
        }
    }


    //REGISTRASI PASIEN
    public function register(Request $request)
    {
        $data['title'] = "Register Pasien";
        return view('/pasien/register', $data);
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
                    $request->input('n_bpjs')
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
                    $request->input('n_bpjs')
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
            return redirect('/pasien/login');
        } else {
            return redirect('/pasien/register');
        }
    }

    // ------------------------------ PEGAWAI ------------------------------------

    //LOGIN PEGAWAI
    public function loginPegawai()
    {
        $data['title'] = "Login Pegawai";
        return view('pegawai/login', $data);
    }

    public function loginPegawaiAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            $result = DB::selectOne("SELECT * FROM tb_pegawai WHERE username = ? AND password = ?", [
                $request->input('username'),
                $request->input('password')
            ]);

            if ($result != null) {
                $request->session()->put('s_id_peg', $result->id_peg);
                $request->session()->put('s_username', $result->username);
                $request->session()->put('s_password', $result->password);
                $request->session()->put('s_nama_peg', $result->nama_peg);


                return redirect('/pegawai/home');
            } else {
                return redirect('/pegawai/login')->with('error', 'Email atau Password salah,harap masukkan ulang!');
            }
        } else {
            return redirect('/pegawai/login');
        }
    }

    //Logout
    public function logout()
    {
        Session::flush();
        return redirect('/pegawai/login')->with('warning', 'Kamu berhasil logout');
    }
    
    public function Pasienlogout(Request $request){
        Session::flush();
        return redirect('/');
    }
}
