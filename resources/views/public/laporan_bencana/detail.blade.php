@extends('public.layout.app')

@section('title', 'Detail Laporan')

@section('css')
    <style>
        .laporan-lengkap {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border: 1px solid black;
            border-radius: 5px;
        }

        .image-laporan {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <h2 class="text-center">Detail Laporan</h2>
                <div class="laporan-lengkap mt-4">
                    <div class="row">
                        <div class="col-md-6 p-5">
                            <h5>
                                {{ $laporanBencana->nama_bencana }}
                            </h5>
                            <p class="text-secondary">
                                {{ $laporanBencana->jenis_bencana }}
                            </p>
                            <p class="mt-5 mb-0">
                                Status Penanggulangan:
                            </p>
                            @if ($laporanBencana->status_penanggulangan->status == 'menunggu')
                                <p class="badge rounded-pill bg-danger text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'diterima')
                                <p class="badge rounded-pill bg-info text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'proses')
                                <p class="badge rounded-pill bg-warning text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'sukses')
                                <p class="badge rounded-pill bg-success text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @endif
                            <p class="mt-3 mb-0">
                                Tanggal:
                            </p>
                            <p>
                                {{ \Carbon\Carbon::parse($laporanBencana->created_at)->locale('id-ID')->format('d F Y') }}
                            </p>
                            <p class="mb-0">
                                Lokasi:
                            </p>
                            <p>
                                {{ $laporanBencana->lokasi }}
                            </p>
                            <p class="mb-0">
                                Status Bencana:
                            </p>
                            <p>
                                {{ $laporanBencana->status_bencana }}
                            </p>
                            <p class="mb-0">
                                Keterangan:
                            </p>
                            <p>
                                {{ $laporanBencana->keterangan }}
                            </p>
                        </div>
                        <div class="col-md-6 p-5">
                            <p>
                                Gambar:
                            </p>
                            <img src="{{ asset('laporan/' . $laporanBencana->gambar) }}" class="image-laporan"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="laporan-lengkap mt-4">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <h6>Kerusakan Infrastruktur</h6>
                        </div>
                        <div class="col-md-12 mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Infrastruktur</th>
                                        <th>Rusak Ringan</th>
                                        <th>Rusak Berat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporanBencana->kerusakan as $item)
                                    <tr>
                                        <td>{{ $item->nama_infrastruktur }}</td>
                                        <td>{{ $item->rusak_ringan }}</td>
                                        <td>{{ $item->rusak_berat }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="3">Data Kerusakan Tidak Ada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="laporan-lengkap mt-4">
                    <div class="row">
                        <div class="col-md-12 p-5">
                            <h6>Korban Jiwa</h6>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <p class="mb-0">
                                        Meninggal:
                                    </p>
                                    <b>
                                        {{ $laporanBencana->korban->meninggal }}
                                    </b>
                                    <p class="mb-0 mt-3">
                                        Luka Berat:
                                    </p>
                                    <b>
                                        {{ $laporanBencana->korban->luka_berat }}
                                    </b>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0 mt-3">
                                        Luka Ringan:
                                    </p>
                                    <b class="text-capitalize">
                                        {{ $laporanBencana->korban->luka_ringan }}
                                    </b>
                                    <p class="mb-0 mt-3">
                                        Hilang:
                                    </p>
                                    <b>
                                        {{ $laporanBencana->korban->hilang }} <br>
                                        {{ $laporanBencana->upaya }}
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
