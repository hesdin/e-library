<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PenilaianSikapController extends Controller
{
    public function index()
    {
        $siswa = DB::table('tb_siswa')->get();
        return view('admin.penilaian_sikap.index',compact('siswa'));
    }
}
