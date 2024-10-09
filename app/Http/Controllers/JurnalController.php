<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use App\Http\Requests\JurnalRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class JurnalController extends BaseController
{
    public function index()
    {
        return view('admin.jurnal.index');
    }

    public function datatable()
    {
        $data = array();
        try {
            $data = DB::table('tb_jurnal')
                ->join('tb_kompetensi_dasar', 'tb_jurnal.kompetensi_id', 'tb_kompetensi_dasar.id')
                ->join('tb_kelas', 'tb_jurnal.kelas_id', '=', 'tb_kelas.id')
                ->select('tb_jurnal.id', 'tb_jurnal.uuid', 'tb_kompetensi_dasar.kompetensi_dasar', 'tb_jurnal.materi', 'tb_jurnal.hasil', 'tb_jurnal.hadir', 'tb_jurnal.tidak_hadir', 'tb_jurnal.tanggal', 'tb_jurnal.keterangan')
                ->get();
        } catch (\Throwable $th) {
            return $this->sendError('Gagal', $th->getMessage(), 200);
        }
        return $this->sendResponse($data, 'Mata Pelajaran Fetched Success');
    }

    public function create()
    {

        $kd = DB::table('tb_kompetensi_dasar')
            ->join('tb_mata_pelajaran', 'tb_kompetensi_dasar.mata_pelajaran_id', '=', 'tb_mata_pelajaran.id')
            ->select('tb_kompetensi_dasar.id', 'kompetensi_inti')
            ->where('tb_mata_pelajaran.tenaga_kependidikan_id', auth()->user()->tenaga_kependidikan_id)
            ->get();

        // dd($kd);

        $mapel = DB::table("tb_mata_pelajaran")
            ->where('tenaga_kependidikan_id', auth()->user()->tenaga_kependidikan_id)
            ->get();

        // dd($mapel);

        $kelas = DB::table("tb_kelas")->get();

        return view('admin.jurnal.create', compact('kd', 'kelas', 'mapel'));
    }

    public function store(JurnalRequest $request)
    {
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


    public function export()
    {

        $tanggal = request('tanggal');
        $data = array();

        $data = DB::table('tb_jurnal')
            ->join('tb_kompetensi_dasar', 'tb_jurnal.kompetensi_id', 'tb_kompetensi_dasar.id')
            ->join('tb_kelas', 'tb_jurnal.kelas_id', '=', 'tb_kelas.id')
            ->select('tb_jurnal.id', 'tb_jurnal.uuid', 'tb_kompetensi_dasar.kompetensi_dasar', 'tb_jurnal.materi', 'tb_jurnal.hasil', 'tb_jurnal.hadir', 'tb_jurnal.tidak_hadir', 'tb_jurnal.tanggal', 'tb_jurnal.keterangan', 'tb_kelas.kelas')
            ->where('tb_jurnal.tanggal', $tanggal)
            ->get();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('DINAS PENDIDIKAN')
            ->setLastModifiedBy('DINAS PENDIDIKAN')
            ->setTitle('JURNAL GURU')
            ->setSubject('JURNAL GURU')
            ->setDescription('JURNAL GURU')
            ->setKeywords('pdf php')
            ->setCategory('JURNAL GURU');
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO);
        $sheet->getRowDimension(1)->setRowHeight(20);
        $sheet->getRowDimension(2)->setRowHeight(20);
        $sheet->getRowDimension(3)->setRowHeight(20);


        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);
        $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

        // //Margin PDF
        $spreadsheet->getActiveSheet()->getPageMargins()->setTop(0.3);
        $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.3);
        $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.5);
        $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0.3);

        $sheet->setCellValue('A1', 'JURNAL HARIAN GURU')->mergeCells('A1:I1');
        $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:I1')->getFont()->setSize(14);

        $sheet->setCellValue('A3', 'No');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->setCellValue('B3', 'Tanggal');
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->setCellValue('C3', 'Kelas');
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->setCellValue('D3', 'KD & Materi Pokok');
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->setCellValue('E3', 'Rincian Materi');
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->setCellValue('F3', 'Hasil');
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->setCellValue('G3', 'Hadir');
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->setCellValue('H3', 'Tidak Hadir');
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->setCellValue('I3', 'Keterangan');
        $sheet->getColumnDimension('I')->setWidth(25);

        $sheet->getStyle('A3:I3')->getFont()->setSize(12);
        $sheet->getStyle('A3:I3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('E1F5FE');

        $cell = 4;

        foreach ($data as $key => $value) {
            $sheet->getRowDimension($cell)->setRowHeight(30);
            $sheet->setCellValue('A' . $cell, $key + 1);
            $sheet->setCellValue('B' . $cell, $value->tanggal);
            $sheet->setCellValue('C' . $cell, $value->kelas);
            $sheet->setCellValue('D' . $cell, strip_tags($value->kompetensi_dasar));
            $sheet->setCellValue('E' . $cell, strip_tags($value->materi));
            $sheet->setCellValue('F' . $cell, strip_tags($value->hasil));
            $sheet->setCellValue('G' . $cell, strip_tags($value->hadir));
            $sheet->setCellValue('H' . $cell, strip_tags($value->tidak_hadir));
            $cell++;
        }

        $border = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '0000000'],
                ],
            ],
        ];


        $sheet->getStyle('A3:I' . $cell)->applyFromArray($border);
        $sheet->getStyle('A3:I' . $cell)->getAlignment()->setVertical('center')->setHorizontal('center');


        $spreadsheet->getActiveSheet()->getHeaderFooter()
            ->setOddHeader('&C&H' . url()->current());
        $spreadsheet->getActiveSheet()->getHeaderFooter()
            ->setOddFooter('&L&B &RPage &P of &N');
        $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
        \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);
        header('Content-Type: application/pdf');
        header('Cache-Control: max-age=0');
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Pdf');

        $writer->save('php://output');
    }
}
