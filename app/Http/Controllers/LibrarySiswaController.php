<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrarySiswaController extends Controller
{
    public function index($topic_id)
    {
        $learningResources = DB::table('tb_sumber_belajar')
            ->where('topik_id', $topic_id)
            ->get();


        return view('siswa.library.index', compact('learningResources'));
    }
}
