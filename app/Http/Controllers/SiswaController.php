<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;
use App\Http\Controllers\BaseController as BaseController;
use Hash;
use DB;
class SiswaController extends BaseController
{
    public function datatable(){
        $data = array();
        try {
            $data = DB::table('tb_siswa')
            ->join('tb_kelas','tb_siswa.kelas_id','=','tb_kelas.id')
            ->select('tb_siswa.uuid','tb_siswa.nipd','tb_siswa.nisn','tb_siswa.nama','tb_kelas.kelas')
            ->orderBy('tb_siswa.created_at','ASC')->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa Fetched Success');
    }

    public function index()
    {
        $kelas = DB::table("tb_kelas")->get();
        return view('admin.siswa.index',compact("kelas"));
    }

    public function store(SiswaRequest $request){
        $data = array();
        try {

            $data = new Siswa;
            $data->kelas_id = $request->kelas_id;
            $data->nipd = $request->nipd;
            $data->nisn = $request->nisn;
            $data->nama = $request->nama;
            $data->username = $request->nisn;
            $data->password = Hash::make($request->nisn);
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->alamat = $request->alamat;
            $data->nomor_whatsaap = $request->nomor_whatsaap;
            $data->nama_wali = $request->nama_wali;
            $data->pekerjaan_wali = $request->pekerjaan_wali;
            $data->penghasilan_wali = $request->penghasilan_wali;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = Siswa::where("uuid",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa Store Success');
    }

    public function update(SiswaRequest $request, $params){
        $data = array();
        try {

            $data = Siswa::where('uuid',$params)->first();
            $data->kelas_id = $request->kelas_id;
            $data->nipd = $request->nipd;
            $data->nisn = $request->nisn;
            $data->nama = $request->nama;
            $data->username = $request->nisn;
            $data->password = Hash::make($request->nisn);
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->alamat = $request->alamat;
            $data->nomor_whatsaap = $request->nomor_whatsaap;
            $data->nama_wali = $request->nama_wali;
            $data->pekerjaan_wali = $request->pekerjaan_wali;
            $data->penghasilan_wali = $request->penghasilan_wali;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa Store Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = Siswa::where('uuid', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa Delete success');
    }

    public function siswaByKelas($params){
       $data = array();
        try {
            $data = Siswa::where("kelas_id",$params)->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Siswa By Kelas Success'); 
    }
}
