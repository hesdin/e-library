<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrarySiswaController extends Controller
{
    public function index($topic_id)
    {
        // $learningResources = DB::table('tb_sumber_belajar')
        //     ->join('')
        //     ->where('topik_id', $topic_id)
        //     ->get();

        $learningResources = DB::table('tb_sumber_belajar')->join('tb_topik','tb_sumber_belajar.topik_id','=','tb_topik.id')->join('tb_mata_pelajaran','tb_sumber_belajar.mata_pelajaran_id','=','tb_mata_pelajaran.id')->select('tb_sumber_belajar.id','tb_sumber_belajar.judul','tb_sumber_belajar.kategori','tb_sumber_belajar.youtube_url','tb_sumber_belajar.file_url','tb_sumber_belajar.deskripsi','tb_topik.topik','tb_mata_pelajaran.mata_pelajaran')->orderBy('tb_sumber_belajar.created_at','ASC')->where('tb_sumber_belajar.topik_id',$topic_id)->get();


        return view('siswa.library.index', compact('learningResources'));
    }
}
