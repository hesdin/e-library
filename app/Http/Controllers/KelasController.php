<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Kelas;
use App\Http\Requests\KelasRequest;
use DB;
class KelasController extends BaseController
{
    
    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_kelas')
            ->select("tb_kelas.uuid","tb_kelas.kelas","tb_kelas.tingkatan","tb_tenaga_kependidikan.nama")
            ->join('tb_tenaga_kependidikan','tb_kelas.wali_kelas_id','=','tb_tenaga_kependidikan.id')
            ->orderBy('tb_kelas.tingkatan','DESC')
            ->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kelas Fetched Success');
    }

    public function index()
    {
        $wali_kelas = DB::table('tb_tenaga_kependidikan')->select("id","nama","nip")->where("jabatan","guru")->get();
        return view('admin.kelas.index',compact("wali_kelas"));
    }

    public function store(KelasRequest $request){
        $data = array();
        try {
            $data = new Kelas;
            $data->wali_kelas_id = $request->wali_kelas_id;
            $data->kelas = $request->kelas;
            $data->tingkatan = $request->tingkatan;
            $data->save();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kelas Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = Kelas::where("uuid",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kelas Store Success');
    }

    public function update(KelasRequest $request,$params){
        $data = array();
        try {
            $data = Kelas::where('uuid',$params)->first();
            $data->wali_kelas_id = $request->wali_kelas_id;
            $data->kelas = $request->kelas;
            $data->tingkatan = $request->tingkatan;
            $data->save();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kelas Update Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = Kelas::where('uuid', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Kelas Delete success');
    }

}
