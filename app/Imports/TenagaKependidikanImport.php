<?php

namespace App\Imports;

use App\Models\TenagaKependidikan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TenagaKependidikanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // dd($row);
        return new TenagaKependidikan([
            'nip' => $row['nip'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'nuptk' => $row['nuptk'],
            'status_kepegawaian' => $row['status_kepegawaian'],
            'jabatan' => $row['jabatan'],
        ]);
    }
}
