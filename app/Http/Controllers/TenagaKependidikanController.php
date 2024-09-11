<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\TenagaKependidikan;
use App\Models\User;
use Hash;
use DB;
use App\Http\Requests\TenagaKependidikanRequest;
class TenagaKependidikanController extends BaseController
{
    public function datatable(){
        $data = array();
        try {
            $data = TenagaKependidikan::orderBy('created_at','ASC')->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Tenaga Kependidikan Fetched Success');
    }

    public function index()
    {
        return view('admin.tenaga_kependidikan.index');
    }

    public function store(TenagaKependidikanRequest $request){
        $data = array();
        try {

            DB::beginTransaction();
            $data = new TenagaKependidikan;
            $data->nip = $request->nip;
            $data->nama = $request->nama;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->nuptk = '-';
            $data->status_kepegawaian = $request->status_kepegawaian;
            $data->jabatan = $request->jabatan;
            $data->save();

            if ($data) {
                if ($data->jabatan == 'kepala_sekolah' || $data->jabatan == 'guru') {
                    $user = new User;
                    $user->username = $data->nip;
                    $user->tenaga_kependidikan_id = $data->id;
                    $user->password = Hash::make($data->nip);
                    $user->role = $data->jabatan == 'kepala_sekolah' ? 'kepala_sekolah' : 'guru';
                    $user->save();
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Tenaga Kependidikan Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = TenagaKependidikan::where("uuid",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Tenaga Kependidikan Store Success');
    }

    public function update(TenagaKependidikanRequest $request, $params){
        $data = array();
        try {

            $data = TenagaKependidikan::where('uuid',$params)->first();
            $data->nip = $request->nip;
            $data->nama = $request->nama;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->nuptk = '-';
            $data->status_kepegawaian = $request->status_kepegawaian;
            $data->jabatan = $request->jabatan;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Tenaga Kependidikan Store Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = TenagaKependidikan::where('uuid', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Tenaga Kependidikan Delete success');
    }
}
