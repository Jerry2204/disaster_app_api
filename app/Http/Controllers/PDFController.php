<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
// use PDF;



class PDFController extends Controller
{
    public function exportPDF()
    {
        $title = 'Laporan Bencanaa';
        $content = 'PDF';

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin.pdf.laporan', compact('title', 'content'))->render());
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('laporan.pdf');
    }
}


