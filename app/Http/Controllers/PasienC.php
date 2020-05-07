<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienC extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $data['title'] = "Home";
        if ($request->session()->get('s_id_pasien') != null) {
            $session_a = $request->session()->get('s_id_pasien');
            $data['tb_pasien'] = DB::selectOne("SELECT *, DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'tl' FROM tb_pasien WHERE id_pasien = ?", [
                $request->session()->get('s_id_pasien')
            ]);
        } else {
            $session_a = "Guest";
        }

        return view('pasien/home', ['session_a' => $session_a], $data);
    }


    // public function home1() {
    //     // $data['title'] = "Home - Puskesmas";
    //     // $data['tb_pasien']= DB::select("SELECT * FROM tb_pasien WHERE id_pasien=?", $data['id_pasien']);
    //     // // $data['tb_pasien'] = DB::select("SELECT *, DATE_FORMAT(tgl_lahir, '%d-%M-%Y') AS 'tl' FROM tb_pasien WHERE id_pasien = ?", [$id]);
    //     // return view('pasien/home1', $data);

    // }

    public function dataPoliAPI()
    {
        $item = DB::select("SELECT * FROM tb_poli", []);
        return response(['data' => $item]);
    }

    // public function poliIndex()
    // {
    //     $data['title'] = "Poli - Puskesmas";
    //     $data['tb_poli'] = DB::select("SELECT * FROM tb_poli WHERE id_poli=?", [$tb_poli->id_poli]);
    //     return view('pasien/poli', $data);
    // }

    public function detailPoli(Request $request, $id)
    {
        $data['title'] = "Home";
        if ($request->session()->get('s_id_pasien') != null) {
            $session_a = $request->session()->get('s_id_pasien');
            $data['pasien'] = DB::selectOne("SELECT * FROM tb_pasien WHERE id_pasien = ?", [
                $request->session()->get('s_id_pasien')
            ]);
            $data['antrian'] = DB::selectOne("SELECT COUNT(id_a) AS antrian FROM tb_antrian WHERE id_pasien = ? AND status = 'Antri'", [
                $request->session()->get('s_id_pasien')
            ]);
        } else {
            $session_a = "Guest";
        }
        $data['poli'] = DB::selectOne("SELECT * FROM tb_poli WHERE id_poli = ?", [
            $id
        ]);
        return view('pasien/poli', ['session_a' => $session_a], $data);
    }

    public function daftarAntrian(Request $request)
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
                $request->input('id_poli'),
                $tglAntri,
                "Antri"
            ]);
            return redirect('/pasien/antrian');
        }
    }

    public function dataAntrianAPI(Request $request)
    {
        $item = DB::select("SELECT tb_antrian.id_a AS 'Id', tb_antrian.no_antrian AS 'No Antrian', tb_poli.nama_poli AS 'Poli', 
            DATE_FORMAT(tgl_a, '%d-%M-%Y') AS 'Tanggal Antrian',
            tb_antrian.status AS 'Status' FROM tb_antrian
            JOIN tb_poli ON tb_antrian.id_poli = tb_poli.id_poli WHERE tb_antrian.id_pasien = ? AND tb_antrian.status = 'Antri'", [
            $request->session()->get('s_id_pasien')
        ]);
        return response(['data' => $item]);
    }

    public function antrian(Request $request)
    {
        $data['title'] = "Home";

        return view('pasien/antrian');
    }

    public function deleteAntrian(Request $request)
    {
        DB::delete('DELETE FROM tb_antrian WHERE id_a = ?', [
            $request->input('id')
        ]);
        return redirect('/');
    }

    public function konfirmasiAntrian(Request $request)
    {
        DB::update('UPDATE tb_antrian SET status = "Selesai" WHERE id_a = ?', [
            $request->input('id')
        ]);

        return redirect('/pasien/riwayat-antrian');
    }

    public function dataRiwayatAPI(Request $request)
    {
        $item = DB::select("SELECT tb_antrian.id_a AS 'Id', tb_antrian.no_antrian AS 'No Antrian', tb_poli.nama_poli AS 'Poli', 
            DATE_FORMAT(tgl_a, '%d-%M-%Y') AS 'Tanggal Antrian',
            tb_antrian.status AS 'Status' FROM tb_antrian
            JOIN tb_poli ON tb_antrian.id_poli = tb_poli.id_poli WHERE tb_antrian.id_pasien = ? AND tb_antrian.status = 'Selesai'", [
            $request->session()->get('s_id_pasien')
        ]);
        return response(['data' => $item]);
    }

    public function riwayat(Request $request)
    {
        $data['title'] = "Home";

        return view('pasien/riwayat_antrian');
    }
}
