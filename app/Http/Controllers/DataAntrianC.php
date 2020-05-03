<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAntrianC extends Controller
{

    public function index()
    {
        //belom dijoin
        $data['antrian'] = DB::table('tb_antrian')->get();
        return view('pegawai/antrian', ['tb_antrian' => $data]);
    }

    public function dataAPI()
    {
        $item = DB::select("SELECT no_antrian AS 'No Antrian', id_pasien AS 'Nama Pasien', 
                id_poli AS 'Poli', DATE_FORMAT(tgl_a, '%d-%M-%Y') AS 'Tanggal Antrian',
                status AS 'Status' FROM tb_antrian", []);
        return response(['data' => $item]);
    }

    public function dataAntrianAdd($id)
    {
        //belom
        $data['title'] = "Pegawai - Add Antrian";
        $data['tb_antrian'] = DB::select("SELECT * FROM tb_antrian");
        $data['tb_pasien'] = DB::select("SELECT *, DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'tl' FROM tb_pasien WHERE id_pasien = ?", [
            $id
        ]);
        $data['tb_poli'] = DB::select("SELECT * FROM tb_poli");
        return view('pegawai/antrian_add', $data);
    }

    //ini belom
    public function dataAntrianAddAction(Request $request)
    {
        $tgl = \Carbon\Carbon::now();
        $tglAntri = $tgl->format('yy-m-d');

        $noAntrian = DB::selectOne("SELECT no_antrian AS no FROM tb_antrian WHERE tgl_a = ? AND id_poli = ?", [
            $tglAntri,
            $request->input('poli')
        ]);

        if ($noAntrian == null) {
            $noAntri = 1;
        } else {
            $noAntri = $noAntrian->no + 1;
        }
        $method = $request->method();
        if ($method == "POST") {
            DB::insert("INSERT INTO tb_antrian (no_antrian, id_pasien, id_poli, tgl_a, status) VALUES ( ?, ?, ?, ?, ?)", [
                $noAntri,
                $request->input('id_pasien'),
                $request->input('poli'),
                $tglAntri,
                "Antri"
            ]);
            return redirect('/pegawai/antrian');
        }
    }
}
