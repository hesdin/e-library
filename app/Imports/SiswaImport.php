<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Siswa([
            'uuid' => (string) \Str::uuid(), // Menghasilkan UUID
            'kelas_id' => $row['kelas_id'], // Pastikan kolom ini ada dalam file Excel
            'nipd' => $row['nipd'], // Pastikan kolom ini ada dalam file Excel
            'nisn' => $row['nisn'], // Pastikan kolom ini ada dalam file Excel
            'nama' => $row['nama'], // Pastikan kolom ini ada dalam file Excel
            'username' => $row['username'], // Pastikan kolom ini ada dalam file Excel
            'password' => bcrypt($row['password']), // Enkripsi password
            'jenis_kelamin' => $row['jenis_kelamin'], // Pastikan kolom ini ada dalam file Excel
            'tempat_lahir' => $row['tempat_lahir'], // Pastikan kolom ini ada dalam file Excel
            'tanggal_lahir' => \Carbon\Carbon::createFromFormat('Y-m-d', $row['tanggal_lahir']), // Format tanggal
            'alamat' => $row['alamat'], // Pastikan kolom ini ada dalam file Excel
            'nomor_whatsaap' => $row['nomor_whatsaap'], // Pastikan kolom ini ada dalam file Excel
            'nama_wali' => $row['nama_wali'] ?? null, // Field ini boleh kosong
            'pekerjaan_wali' => $row['pekerjaan_wali'] ?? null, // Field ini boleh kosong
            'penghasilan_wali' => $row['penghasilan_wali'] ?? null, // Field ini boleh kosong
        ]);
    }
}
