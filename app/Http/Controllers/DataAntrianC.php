<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAntrianC extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->get('s_nama_peg') == null){
            return redirect('/pegawai/login');
        }else{
            $data['antrian'] = DB::table('tb_antrian')->get();
            return view('pegawai/antrian/antrian', ['tb_antrian' => $data]);
        }
    }

    public function dataAPIPasien()
    {
        $item = DB::select("SELECT no_antrian AS 'No Antrian', tb_pasien.nama_pasien AS 'Nama Pasien',
                            tb_poli.nama_poli AS 'Poli', DATE_FORMAT(tgl_a, '%d-%M-%Y') AS 'Tanggal Antrian',
                            status AS 'Status' FROM tb_antrian
                            JOIN tb_pasien ON tb_antrian.id_pasien= tb_pasien.id_pasien
                            JOIN tb_poli ON tb_antrian.id_poli = tb_poli.id_poli GROUP BY tb_poli.nama_poli ORDER BY tb_antrian.tgl_a DESC", []);
        return response(['data' => $item]);
    }

    public function dataAntrianAdd(Request $request,$id)
    {
        if($request->session()->get('s_nama_peg') == null){
            return redirect('/pegawai/login');
        }else{
            $data['title'] = "Pegawai - Add Antrian";
            $data['tb_antrian'] = DB::select("SELECT * FROM tb_antrian");
            $data['tb_pasien'] = DB::select("SELECT *, DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'tl' FROM tb_pasien WHERE id_pasien = ?", [
                $id
            ]);
            $data['tb_poli'] = DB::select("SELECT * FROM tb_poli");
            return view('pegawai/antrian/antrian_add', $data);
        }
    }

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
