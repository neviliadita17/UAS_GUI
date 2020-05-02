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
}
