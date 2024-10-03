<?php

namespace App\Http\Controllers;

use App\Models\SumberBelajar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function dashboardSiswa()
    {
        $siswa = auth()->guard('siswa')->user();

        $count_ebooks = SumberBelajar::where('kategori', 'ebook')->count();
        $count_videos = SumberBelajar::where('kategori', 'video')->count();

        return view('siswa.dashboard', compact('siswa', 'count_ebooks', 'count_videos'));
    }
}
