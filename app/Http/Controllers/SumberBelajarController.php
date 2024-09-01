<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\SumberBelajar;
use App\Http\Requests\SumberBelajarRequest;
class SumberBelajarController extends BaseController
{

    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_sumber_belajar')->join('tb_topik','tb_sumber_belajar.topik_id','=','tb_topik.id')->join('tb_mata_pelajaran','tb_sumber_belajar.mata_pelajaran_id','=','tb_mata_pelajaran.id')->select('tb_sumber_belajar.id','tb_sumber_belajar.judul','tb_sumber_belajar.kategori','tb_sumber_belajar.youtube_url','tb_sumber_belajar.file_url','tb_sumber_belajar.deskripsi','tb_topik.topik','tb_mata_pelajaran.mata_pelajaran')->orderBy('tb_sumber_belajar.created_at','ASC')->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Sumber Belajar Fetched Success');
    }

    public function index(){
        return view('admin.sumber_belajar.index');
    }

    public function create(){
        $topik = DB::table("tb_topik")->get();
        $mapel = DB::table("tb_mata_pelajaran")->get();
        return view('admin.sumber_belajar.create',compact('topik','mapel'));
    }

    public function store(SumberBelajarRequest $request){
        $data = array();
        try {

            if (isset($request->file_url)) {
                $file_dokumen = $request->file_url;
                $filename = $file_dokumen->hashName();
                $path_file_ebook = Storage::putFileAs('public/ebook', $file_dokumen, $filename);
            }

            $data = new SumberBelajar;
            $data->topik_id = $request->topik_id;
            $data->mata_pelajaran_id = $request->mata_pelajaran_id;
            $data->judul = $request->judul;
            $data->tingkatan = $request->tingkatan;
            $data->kategori = $request->kategori;
            $data->youtube_url = $request->youtube_url;
            $data->file_url = isset($request->file_url) ? '/storage/ebook/'.$filename : null;
            $data->deskripsi = $request->deskripsi;
            $data->save();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Sumber Belajar Store Success');
    }
}
