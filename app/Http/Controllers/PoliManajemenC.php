<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliManajemenC extends Controller
{

    public function index()
    {
        $poli = DB::table('tb_poli')->get();
        return view('pegawai/poli/poli', ['tb_poli' => $poli]);
    }

    public function poliAPI()
    {
        $item = DB::select("SELECT id_poli AS Id, nama_poli AS 'Nama Poli', deskripsi AS Deskripsi, gambar_poli AS Gambar FROM tb_poli", []);
        return response(['data' => $item]);
    }

    public function poliAdd()
    {
        $data['title'] = "Pegawai - Add Poli";
        $data['tb_poli'] = DB::select("SELECT * FROM tb_poli");
        return view('pegawai/poli/poli_add', $data);
    }

    public function poliAddAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            $image = $request->file('file');
            $image->move(public_path('/img/poli_img/'), $request->input('nama_poli'));

            DB::insert("INSERT INTO tb_poli (nama_poli,deskripsi,gambar_poli) VALUES (?, ?, ?)", [

                $request->input('nama_poli'),
                $request->input('deskripsi'),
                '/img/poli_img/' . $request->nama_poli
            ]);
            return redirect('/pegawai/poli');
        } else {
            return redirect('/pegawai/poli/add');
        }
    }

    public function poliEdit($id)
    {
        $poli = DB::table('tb_poli')->where('id_poli', $id)->first();
        return view('pegawai/poli/poli_edit', ['tb_poli' => $poli]);
    }

    public function poliEditAction(Request $request)
    {
        $method = $request->method();
        if ($method == "POST") {
            if ($request->file('file') == null) {
                DB::table('tb_poli')->where('id_poli', $request->id)->update([
                    'nama_poli' => $request->nama_poli,
                    'deskripsi' => $request->deskripsi
                ]);
            } else {
                $image = $request->file('file');
                $image->move(public_path('/img/poli_img/'), $request->nama_poli);

                DB::table('tb_poli')->where('id_poli', $request->id)->update([
                    'nama_poli' => $request->nama_poli,
                    'deskripsi' => $request->deskripsi,
                    'gambar_poli' => '/img/poli_img/' . $request->nama_poli
                ]);
            }
            return redirect('/pegawai/poli');
        } else {
            return redirect('/pegawai/poli/edit/' . $request->id);
        }
    }
}
