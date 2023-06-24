<?php

namespace App\Exports;

use App\Models\LaporanBencana;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanBencanaExport implements FromQuery, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        if($this->startDate == null || $this->endDate == null) {
            return LaporanBencana::query();
        }

        return LaporanBencana::query()
            ->whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Jenis Bencana',
            'Nama Bencana',
            'Keterangan',
            'Gambar',
            'Gambar Kejadian',
            'Gambar Pasca',
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
