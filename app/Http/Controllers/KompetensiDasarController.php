<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\KompetensiDasar;
use App\Http\Requests\KompetensiDasarRequest;
use Illuminate\Support\Facades\DB;

class KompetensiDasarController extends BaseController
{
    public function index(){
        return view('admin.master_pelajaran.kompetensi_dasar.index');
    }

    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_kompetensi_dasar')
            ->join('tb_mata_pelajaran','tb_kompetensi_dasar.mata_pelajaran_id','=','tb_mata_pelajaran.id')
            ->select('tb_kompetensi_dasar.id','tb_kompetensi_dasar.uuid','tb_mata_pelajaran.mata_pelajaran','tb_kompetensi_dasar.kompetensi_inti','tb_kompetensi_dasar.kompetensi_dasar');

            if (auth()->user()->role == 'guru') {
                $data->where('tb_mata_pelajaran.tenaga_kependidikan_id',auth()->user()->tenaga_kependidikan_id);
            }

            $data = $data->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Fetched Success');
    }

    public function create(){
        $mapel = DB::table('tb_mata_pelajaran')->get();
        $mapel_auth = DB::table("tb_mata_pelajaran")->where('tenaga_kependidikan_id',auth()->user()->tenaga_kependidikan_id)->first();
        return view('admin.master_pelajaran.kompetensi_dasar.create',compact('mapel','mapel_auth'));
    }


    public function store(KompetensiDasarRequest $request){
        $data = array();
        try {

            $data = new KompetensiDasar;
            $data->mata_pelajaran_id = $request->mata_pelajaran_id;
            $data->kompetensi_inti = $request->kompetensi_inti;
            $data->kompetensi_dasar = $request->kompetensi_dasar;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kompetensi Dasar Store Success');
    }

    public function edit($params){
        $mapel = DB::table('tb_mata_pelajaran')->get();
        $mapel_auth = DB::table("tb_mata_pelajaran")->where('tenaga_kependidikan_id',auth()->user()->tenaga_kependidikan_id)->first();
        $data = DB::table('tb_kompetensi_dasar')->where('uuid',$params)->first();

        return view('admin.master_pelajaran.kompetensi_dasar.edit',compact('mapel','mapel_auth','data'));
    }

    public function update(KompetensiDasarRequest $request, $params){
        $data = array();
        try {

            $data = KompetensiDasar::where("uuid",$params)->first();
            $data->mata_pelajaran_id = $request->mata_pelajaran_id;
            $data->kompetensi_inti = $request->kompetensi_inti;
            $data->kompetensi_dasar = $request->kompetensi_dasar;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kompetensi Dasar Store Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {

            $data = KompetensiDasar::where("uuid",$params)->delete();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kompetensi Dasar Store Success');
    }
}
