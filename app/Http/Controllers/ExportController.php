<?php


namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanBencanaExport;

class ExcelController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new LaporanBencanaExport, 'laporan-bencana.xlsx');
    }

}
