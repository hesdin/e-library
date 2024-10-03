<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TenagaKependidikanImport;

class ImportTenagaKependidikanController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TenagaKependidikanImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Tenaga Kependidikan berhasil diimpor!');
    }
}
