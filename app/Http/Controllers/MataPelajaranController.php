<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use DB;
use App\Http\Requests\MataPelajaranRequest;
use App\Models\MataPelajaran;

class MataPelajaranController extends BaseController
{
    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_mata_pelajaran')
            ->join('tb_tenaga_kependidikan','tb_mata_pelajaran.tenaga_kependidikan_id','=','tb_tenaga_kependidikan.id')
            ->select('tb_mata_pelajaran.id','tb_mata_pelajaran.uuid','tb_mata_pelajaran.kode','tb_mata_pelajaran.mata_pelajaran','tb_tenaga_kependidikan.nama as guru')
            ->orderBy('tb_mata_pelajaran.created_at','ASC')->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Fetched Success');
    }

    public function index()
    {
        $mapel = DB::table("tb_tenaga_kependidikan")->where('jabatan','guru')->get();
        return view('admin.master_pelajaran.mata_pelajaran',compact('mapel'));
    }

    public function store(MataPelajaranRequest $request){
        $data = array();
        try {

            $data = new MataPelajaran;
            $data->tenaga_kependidikan_id = $request->tenaga_kependidikan_id;
            $data->kode = $request->kode;
            $data->mata_pelajaran = $request->mata_pelajaran;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = MataPelajaran::where("uuid",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Store Success');
    }

    public function update(MataPelajaranRequest $request, $params){
        $data = array();
        try {

            $data = MataPelajaran::where('uuid',$params)->first();
            $data->tenaga_kependidikan_id = $request->tenaga_kependidikan_id;
            $data->kode = $request->kode;
            $data->mata_pelajaran = $request->mata_pelajaran;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Store Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = MataPelajaran::where('uuid', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Delete success');
    }
}
