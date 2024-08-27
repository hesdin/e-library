<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topik;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\TopikRequest;

class TopikController extends BaseController
{
    public function datatable(){
        $data = array();
        try {
            $data = Topik::orderBy('created_at','ASC')->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Topik Fetched Success');
    }

    public function index()
    {
        return view('admin.topik.index');
    }

    public function store(TopikRequest $request){
        $data = array();
        try {

            $data = new Topik;
            $data->topik = $request->topik;
            $data->deskripsi = $request->deskripsi;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Topik Store Success');
    }

    public function show($params){
        $data = array();
        try {

            $data = Topik::where("id",$params)->first();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Topik Store Success');
    }

    public function update(TopikRequest $request, $params){
        $data = array();
        try {

            $data = Topik::where('id',$params)->first();
            $data->topik = $request->topik;
            $data->deskripsi = $request->deskripsi;
            $data->save();

        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Topik Store Success');
    }

    public function delete(Request $request, $params){
        $data = array();
        try {
            $data = Topik::where('id', $params)->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Topik Delete success');
    }
}
