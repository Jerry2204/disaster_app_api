@extends('layouts.app')

@section('title', 'Dampak Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Tambah Dampak Bencana</h4>
                        <span>Form Data Kerusakan Infrastruktur</span>
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
                        <li class="breadcrumb-item"><a href="#!">Dampak Bencana</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <form action="{{ route('infra_bencana.update', $bencana->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h5>Data Kerusakan Infrastruktur</h5>
                            <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                            <div class="card-header-right">
                                <i class="icofont icofont-spinner-alt-5"></i>
                            </div>

                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Jenis Infrastruktur</th>
                                            <th>Volume Rusak Ringan</th>
                                            <th>Volume Rusak Berat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bencana->kerusakan as $item)
                                            <tr>
                                                {{-- Input field untuk jenis infrastruktur --}}
                                                <td>
                                                    <input type="text" name="nama_infrastruktur[]"
                                                        id="nama_infrastruktur" class="form-control"
                                                        placeholder="Masukkan nama infrastruktur"
                                                        value="{{ $item->nama_infrastruktur }}" required>
                                                </td>
                                                {{-- Input field untuk jumlah rusak ringan --}}
                                                <td>
                                                    <input type="text" name="rusak_ringan[]" id="rusak_ringan"
                                                        class="form-control" placeholder="Masukkan jumlah rusak ringan"
                                                        value="{{ $item->rusak_ringan }}" required>
                                                </td>
                                                {{-- Input field untuk jumlah rusak berat --}}
                                                <td>
                                                    <input type="text" name="rusak_berat[]" id="rusak_berat"
                                                        class="form-control" placeholder="Masukkan jumlah rusak berat"
                                                        value="{{ $item->rusak_berat }}" required>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                {{-- Input field untuk jenis infrastruktur --}}
                                                <td>
                                                    <input type="text" name="nama_infrastruktur[]"
                                                        id="nama_infrastruktur" class="form-control"
                                                        placeholder="Masukkan nama infrastruktur" value="" required>
                                                </td>
                                                {{-- Input field untuk jumlah rusak ringan --}}
                                                <td>
                                                    <input type="text" name="rusak_ringan[]" id="rusak_ringan"
                                                        class="form-control" placeholder="Masukkan jumlah rusak ringan"
                                                        value="" required>
                                                </td>
                                                {{-- Input field untuk jumlah rusak berat --}}
                                                <td>
                                                    <input type="text" name="rusak_berat[]" id="rusak_berat"
                                                        class="form-control" placeholder="Masukkan jumlah rusak berat"
                                                        value="" required>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                             {{-- Tombol untuk menambah input field --}}
                             <button type="button" id="tambah">Tambah</button>
                             <button type="button" onclick="deleteLastRow()">Hapus Data Terakhir</button>

                             {{-- Data Gambar --}}
                            <div class="card-header">
                                <h5>Gambar Pasca Bencana</h5>
                                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                <div class="card-header-right">
                                    <i class="icofont icofont-spinner-alt-5"></i>
                                </div>
                            </div>
                            <div class="card-block">

                                <div class="form-group {{ $errors->has('nama_bencana') ? 'has-danger' : '' }} row">
                                    <label class="col-sm-5 col-form-label" for="nama_bencana">Gambar kerusakan infrastruktur Saat Kejadian</label>
                                    <div class="col-sm-7">
                                            <input type="file" name="gambar_kejadian[]" id="file" class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('nama_bencana') ? 'has-danger' : '' }} row">
                                    <label class="col-sm-5 col-form-label" for="nama_bencana">Gambar kerusakan infrastruktur Setelah Kejadian</label>
                                    <div class="col-sm-7">
                                    <input type="file" name="gambar_pasca[]" id="file" class="form-control" multiple>
                                    </div>
                                </div>
                    </form>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>

@endsection

@section('js')
    {{-- Script untuk menambah input field --}}
    <script>
        $(document).ready(function() {
            // Ambil element tbody
            var tbody = $('tbody');

            // Tambah input field ketika tombol tambah di klik
            $('#tambah').click(function() {
                // Ambil element tr terakhir
                var lastRow = tbody.find('tr:last');

                // Buat clone element tr terakhir
                var newRow = lastRow.clone();

                // Hapus value pada input field jumlah rusak ringan dan rusak berat
                newRow.find('input[type="text"]').val('');
                newRow.find('input[type="text"]').val('');

                // Tambahkan row baru ke tbody
                tbody.append(newRow);
            });
        });

        function deleteLastRow() {
  var table = document.getElementById("myTable");
  var numRows = table.rows.length;
  if (numRows > 1) {
    table.deleteRow(numRows - 1);
  }
}
    </script>
@endsection
