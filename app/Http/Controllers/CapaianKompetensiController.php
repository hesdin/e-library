<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\CapaianKompetensi;
use DB;
class CapaianKompetensiController extends BaseController
{
     public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_capaian_kompetensi')
            ->select("tb_capaian_kompetensi.uuid","tb_capaian_kompetensi.tipe_capaian","tb_capaian_kompetensi.kode","tb_capaian_kompetensi.deskripsi","tb_capaian_kompetensi.ringkasan")
            ->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Capaian Kompetensi Fetched Success');
    }

    public function index()
    {
        return view('admin.capaian_kompetensi.index');
    }

    public function store(Request $request){
        $data = array();
        try {

            $mata_pelajaran = DB::table('tb_mata_pelajaran')->where('tenaga_kependidikan_id',auth()->user()->tenaga_kependidikan_id)->first();

            $data = new CapaianKompetensi;
            $data->mata_pelajaran_id = $mata_pelajaran->id;
            $data->tipe_capaian = $request->tipe_capaian;
            $data->kode = $request->kode;
            $data->deskripsi = $request->deskripsi;
            $data->ringkasan = $request->ringkasan;
            $data->save();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Capaian Kompetensi Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = CapaianKompetensi::where("uuid",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Capaian Kompetensi Store Success');
    }

    public function update(KelasRequest $request,$params){
        $data = array();
        try {
            $data = CapaianKompetensi::where('uuid',$params)->first();
            $data->mata_pelajaran_id = $request->mata_pelajaran_id;
            $data->tipe_capaian = $request->tipe_capaian;
            $data->kode = $request->kode;
            $data->deskripsi = $request->deskripsi;
            $data->ringkasan = $request->ringkasan;
            $data->save();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Capaian Kompetensi Update Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = CapaianKompetensi::where('uuid', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Capaian Kompetensi Delete success');
    }
}
