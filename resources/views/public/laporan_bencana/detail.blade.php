@extends('public.layout.app')

@section('title', 'Detail Laporan')

@section('css')
    <style>
        .laporan-lengkap {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border: 1px solid black;
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
                                {{ $laporanBencana->created_at }}
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
                            <img src="{{ asset('laporan/' . $laporanBencana->gambar) }}" class="image-laporan" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
