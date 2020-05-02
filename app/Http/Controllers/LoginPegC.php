<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginPegC extends Controller
{
    public function login()
    {
        return view('pegawai/login');
    }
}

?>