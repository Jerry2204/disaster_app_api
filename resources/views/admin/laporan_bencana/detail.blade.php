@extends('layouts.app')

@section('title', 'Rawan Bencana')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/css/custom/laporan_detail.css') }}">
@endsection
@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Laporan Bencana</h4>
                        <span>Daftar Laporan Bencana</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Bencana</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h5>{{ $laporanBencana->nama_bencana }}</h5>
                        <span>{{ $laporanBencana->jenis_bencana }}</span>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option" style="width: 35px;">
                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-0">
                                    Tanggal:
                                </p>
                                <b>
                                    {{ $laporanBencana->created_at->format('d M Y') }}
                                </b>
                                <p class="mb-0 mt-3">
                                    Lokasi:
                                </p>
                                <b>
                                    {{ $laporanBencana->lokasi }}
                                </b>
                                <p class="mb-0 mt-3">
                                    Status Bencana:
                                </p>
                                <b class="text-capitalize">
                                    {{ $laporanBencana->status_bencana }}
                                </b>
                                <p class="mb-0 mt-3">
                                    Keterangan:
                                </p>
                                <b>
                                    {{ $laporanBencana->keterangan }}
                                </b>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0">
                                    Gambar:
                                </p>
                                <img class="gambar-bencana" src="{{ asset("laporan/$laporanBencana->gambar") }}" alt="{{ $laporanBencana->nama_bencana }}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="card-header">
                        <h5>Kerusakan Infrastruktur</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option" style="width: 35px;">
                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">

                    </div>
                </div>
                <div class="card p-3">
                    <div class="card-header">
                        <h5>Korban Jiwa</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option" style="width: 35px;">
                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
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
                                    {{ $laporanBencana->korban->hilang }}
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection
