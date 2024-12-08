<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use DB;
class AbsensiController extends BaseController
{
    public function index(){
        $kelas = DB::table("tb_kelas")->get();
        $mapel = DB::table("tb_mata_pelajaran")
            ->where('tenaga_kependidikan_id', auth()->user()->tenaga_kependidikan_id)
            ->get();

        return view('admin.absensi.index',compact('kelas','mapel'));
    }

    public function datatable(){
        $bulan = request('bulan');
        $kelas = request("kelas");
        $tahun = date('Y');
        $data = array();
        try {

            $fields = [];
            for ($day = 1; $day <= 31; $day++) {
                $fields[] = DB::raw("MAX(CASE WHEN DAY(tb_absensi_siswa.tanggal) = {$day} THEN tb_absensi_siswa.status ELSE NULL END) as `{$day}`");
            }

            $data = DB::table('tb_absensi_siswa')
            ->select(array_merge([
                'tb_siswa.nisn',
                'tb_siswa.nama'
            ], $fields, [
                DB::raw("SUM(CASE WHEN tb_absensi_siswa.status = 'hadir' THEN 1 ELSE 0 END) as h"),
                DB::raw("SUM(CASE WHEN tb_absensi_siswa.status = 'izin' THEN 1 ELSE 0 END) as i"),
                DB::raw("SUM(CASE WHEN tb_absensi_siswa.status = 'sakit' THEN 1 ELSE 0 END) as s"),
                DB::raw("SUM(CASE WHEN tb_absensi_siswa.status = 'alpa' THEN 1 ELSE 0 END) as a")
            ]))
            ->join('tb_siswa', 'tb_absensi_siswa.siswa_id', '=', 'tb_siswa.id')
            ->where('tb_siswa.kelas_id', $kelas)
            ->whereMonth('tb_absensi_siswa.tanggal', $bulan)
            ->whereYear('tb_absensi_siswa.tanggal', $tahun)
            ->groupBy('tb_siswa.id', 'tb_siswa.nisn', 'tb_siswa.nama')
            ->orderBy('tb_siswa.nisn')
            ->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Absensi Fetched Success');
    }
}
