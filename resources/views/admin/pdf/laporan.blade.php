<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        @page {
            size: landscape;
            margin: 20mm 10mm 10mm 10mm;
            transform: rotate(270deg);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            word-wrap: break-word;
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <center><h1><u>{{ $content }}</u></h1></h1></center>

    <table>
        <thead>
            <tr>
                {{-- <th rowspan="2">Tanggal Kejadian</th> --}}
                <th rowspan="2">Nama Bencana</th>
                <th rowspan="2">Jenis Bencana</th>
                <th rowspan="2">Desa</th>
                <th rowspan="2">Kecamatan</th>
                <th colspan="4">Korban</th>
                <th colspan="3">Kerusakan</th>

            </tr>
            <tr>
                <th>Meninggal</th>
                <th>Luka Berat</th>
                <th>Luka Ringan</th>
                <th>Hilang</th>
                <th>Nama Infrastruktur</th>
                <th>Rusak Berat</th>
                <th>Rusak Ringan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanBencanas as $item)

            <tr>
                {{-- <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id-ID')->format('d F Y') }}</td> --}}
                <td>{{ $item->nama_bencana }}</td>
                <td>{{ $item->jenis_bencana }}</td>
                <td>{{ $item->nama_desa }}</td>
                <td>{{ $item->nama_kecamatan }}</td>
                <td>{{ $item->meninggal }}</td>
                <td>{{ $item->luka_berat }}</td>
                <td>{{ $item->luka_ringan }}</td>
                <td>{{ $item->hilang }}</td>
                <td>{{ $item->nama_infrastruktur }}</td>
                <td>{{ $item->rusak_berat }}</td>
                <td>{{ $item->rusak_ringan  }}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
</body>
</html>
