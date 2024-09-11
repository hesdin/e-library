<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use DB;
use App\Models\Jurnal;
use App\Http\Requests\JurnalRequest;

class JurnalController extends BaseController
{
    public function index(){
        return view('admin.jurnal.index');
    }

    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_jurnal')
                    ->join('tb_kompetensi_dasar','tb_jurnal.kompetensi_id','tb_kompetensi_dasar.id')
                    ->join('tb_kelas','tb_jurnal.kelas_id','=','tb_kelas.id')
                    ->select('tb_jurnal.id','tb_jurnal.uuid','tb_kompetensi_dasar.kompetensi_dasar','tb_jurnal.materi','tb_jurnal.hasil','tb_jurnal.hadir','tb_jurnal.tidak_hadir','tb_jurnal.tanggal','tb_jurnal.keterangan')
                    ->get();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Fetched Success');
    }

     public function create(){
        $kd = DB::table('tb_kompetensi_dasar')
            ->join('tb_mata_pelajaran','tb_kompetensi_dasar.mata_pelajaran_id','=','tb_mata_pelajaran.id')
            ->select('tb_kompetensi_dasar.id','kompetensi_inti')
            ->where('tb_mata_pelajaran.tenaga_kependidikan_id',auth()->user()->tenaga_kependidikan_id)
            ->get();
        $kelas = DB::table("tb_kelas")->get();
        return view('admin.jurnal.create',compact('kd','kelas'));
    }

    public function store(JurnalRequest $request){
        $data = array();
        try {

            $data = new Jurnal;
            $data->kompetensi_id = $request->kompetensi_id;
            $data->kelas_id = $request->kelas_id;
            $data->materi = $request->materi;
            $data->hasil = $request->hasil;
            $data->hadir = $request->hadir;
            $data->tidak_hadir = $request->tidak_hadir;
            $data->tanggal = $request->tanggal;
            $data->keterangan = $request->keterangan;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kompetensi Dasar Store Success');
    }
}
