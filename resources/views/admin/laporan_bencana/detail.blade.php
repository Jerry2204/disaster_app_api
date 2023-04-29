@extends('layouts.app')

@section('title', 'Laporan Bencana')

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
                        @if (auth()->user()->role == 'tanggap_darurat')
                        @if ($laporanBencana->status_penanggulangan->status == 'menunggu')
                        <a href="{{ route('laporan_bencana.confirm', $laporanBencana->id) }}" class="btn btn-sm btn-success">
                            Konfirmasi
                        </a>
                        @elseif ($laporanBencana->status_penanggulangan->status == 'proses')
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#selesaiModal">
                            Selesai
                        </button>
                        @elseif ($laporanBencana->status_penanggulangan->status == 'diterima')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                            Proses Laporan
                        </button>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#selesaiModal">
                            Selesai
                        </button>
                        @else
                        @endif
                        @endif
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
                                    Status Penanggulangan:
                                </p>

                                @if ($laporanBencana->status_penanggulangan->status == 'selesai')
                                    <div class="badge badge-success">
                                        {{ $laporanBencana->status_penanggulangan->status }}</div>
                                @elseif ($laporanBencana->status_penanggulangan->status == 'menunggu')
                                    <div class="badge badge-danger">{{ $laporanBencana->status_penanggulangan->status }}
                                    </div>
                                @elseif ($laporanBencana->status_penanggulangan->status == 'diterima')
                                    <div class="badge badge-info">{{ $laporanBencana->status_penanggulangan->status }}
                                    </div>
                                @elseif ($laporanBencana->status_penanggulangan->status == 'proses')
                                    <div class="badge badge-warning">
                                        {{ $laporanBencana->status_penanggulangan->status }}</div>
                                @endif
                                <p class="mb-0 mt-3">
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
                                <img class="gambar-bencana" src="{{ asset("laporan/$laporanBencana->gambar") }}"
                                    alt="{{ $laporanBencana->nama_bencana }}">
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
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Jenis Infrastruktur</th>
                                        <th>Jumlah Rusak Ringan</th>
                                        <th>Jumlah Rusak Berat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporanBencana->kerusakan as $item)
                                        <tr>
                                            {{-- Input field untuk jenis infrastruktur --}}
                                            <td>{{ $item->nama_infrastruktur }}
                                            </td>
                                            {{-- Input field untuk jumlah rusak ringan --}}
                                            <td>
                                                {{ $item->rusak_ringan }}
                                            </td>
                                            {{-- Input field untuk jumlah rusak berat --}}
                                            <td>
                                                {{ $item->rusak_berat }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Data Kerusakan Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

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

    {{-- Modal Proses --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Proses Laporan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('laporan_bencana.process', $laporanBencana->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="petugas">Petugas</label>
                        <input id="petugas" name="petugas" class="form-control" type="text" placeholder="Masukkan nama petugas">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Modal Selesai --}}
      <div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('laporan_bencana.complete', $laporanBencana->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Petugas">Petugas</label>
                        <input id="Petugas" class="form-control" type="text" name="petugas" placeholder="Masukkan nama petugas" value="{{ $laporanBencana->status_penanggulangan->petugas ? $laporanBencana->status_penanggulangan->petugas : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" class="form-control" name="keterangan" rows="5" placeholder="Masukkan keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tindakan">Tindakan</label>
                        <textarea id="tindakan" class="form-control" name="tindakan" rows="5" placeholder="Masukkan tindakan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
