<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiC extends Controller
{
    public function index()
    {
        return view('pegawai/pegawai');
    }

    public function jumlahPasienAPI()
    {
        $item = DB::select("SELECT COUNT(id_pasien) AS 'Jumlah Pasien' FROM tb_pasien", []);
        return response(['data' => $item]);
    }

    public function jumlahPoliAPI()
    {
        $item = DB::select("SELECT COUNT(id_poli) AS 'Jumlah Poli' FROM tb_poli", []);
        return response(['data' => $item]);
    }

    public function jumlahAntrianAPI()
    {
        $tgl = \Carbon\Carbon::now();
        $tglHariIni = $tgl->format('yy-m-d');

        $item = DB::select("SELECT COUNT(id_a) AS 'Jumlah Antrian' FROM tb_antrian WHERE tgl_a = ?", [
            $tglHariIni
        ]);
        return response(['data' => $item]);
    }
}
