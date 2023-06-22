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
                            <td>
                                <h5>{{ $laporanBencana->nama_bencana }}</h5>
                            </td>
                            <p>
                                {{ $laporanBencana->jenis_bencana }}
                            </p>
                            <b class="mt-0 mb-0">
                                Status Penanggulangan:
                            </b>
                            <br>
                            @if ($laporanBencana->status_penanggulangan->status == 'Ditolak')
                                <p class="badge rounded-pill bg-danger text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                                <p class="mb-0 ">
                                    Alasan Penolakan:
                                </p>
                                <b>
                                    {{ $laporanBencana->status_penanggulangan->alasan_penolakan }}
                                </b>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'Diterima')
                                <p class="badge rounded-pill bg-info text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'Proses')
                                <p class="badge rounded-pill bg-warning text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'Selesai')
                                <p class="badge rounded-pill bg-success text-capitalize">
                                    {{ $laporanBencana->status_penanggulangan->status }}
                                </p>
                            @elseif ($laporanBencana->status_penanggulangan->status == 'Menunggu')
                                <p class="badge rounded-pill bg-secondary text-capitalize">
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
                                Desa {{ $laporanBencana->nama_desa }},Kecamatan {{ $laporanBencana->nama_kecamatan }}
                            </p>
                            <p class="mb-0">
                                Status Bencana:
                                {{-- {{ $laporanBencana->status_penanggulangan->status}} --}}

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
                            <h6><b>Data Kerusakan Infrastruktur</b></h6>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Gambar kerusakan infrastruktur Saat Kejadian:</b>
                                    @if (!empty($laporanBencana->gambar_kejadian))
                                        @foreach (json_decode($laporanBencana->gambar_kejadian) as $image)
                                            <img src="{{ asset('laporan/' . $image) }}" style="width: 50%; height: auto; display: block; margin-bottom: 10px;" alt="">
                                        @endforeach
                                    @else
                                        <p>Gambar Kerusakan Belum Ditambahkan</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <b>Gambar kerusakan infrastruktur Sesudah Kejadian:</b>
                                    @if (!empty($laporanBencana->gambar_pasca))
                                        @foreach (json_decode($laporanBencana->gambar_pasca) as $image)
                                            <img src="{{ asset('laporan/' . $image) }}" style="width: 50%; height: auto; display: block; margin-bottom: 10px;" alt="">
                                        @endforeach
                                    @else
                                        <p>Gambar Kerusakan Pasca Bencana Belum Ditambahkan</p>
                                    @endif
                                </div>
                                {{-- <div class="col-md-4">
                                    <!-- Tambahkan konten kolom ketiga di sini -->
                                </div> --}}
                            </div>



                        </div>
                    </div>
                </div>

                <div class="laporan-lengkap mt-4">
                    <div class="row">
                        <div class="col-md-12 p-5">
                            <h6><b>Korban Jiwa</b></h6>
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

                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="laporan-lengkap mt-4">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <h6><b>Upaya</b></h6>
                        </div>
                        <div class="col-md-12 mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> {{ $laporanBencana->status_penanggulangan->tindakan }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporanBencana->kerusakan as $item)
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">Upaya Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
