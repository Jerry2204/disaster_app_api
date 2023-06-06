<?php

namespace App\Exports;

use App\Models\LaporanBencana;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LaporanBencanaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LaporanBencana::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Jenis Bencana',
            'Nama Bencana',
            'Lokasi',
            'Keterangan',
            'Gambar',
            'Status Bencana',
            'Confirmed',
            'Korban ID',
            'Status Penanggulangan ID',
            'User ID',
            'Desa ID',
            'Created At',
            'Updated At',
        ];
    }
}
