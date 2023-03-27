@extends('layouts.app')

@section('title', 'Rawan Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Rawan Bencana</h4>
                        <span>Daftar Daerah Rawan Bencana</span>
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
                        <li class="breadcrumb-item"><a href="#!">Rawan Bencana</a>
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Daerah Rawan Bencana
                        </button>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left "></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wilayah</th>
                                        <th>Koordinat Lattitude</th>
                                        <th>Koordinat Longitude</th>
                                        <th>Jenis Rawan Bencana</th>
                                        <th>Level Rawan Bencana</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rawanBencana as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_wilayah }}</td>
                                            <td>{{ $item->koordinat_lattitude }}</td>
                                            <td>{{ $item->koordinat_longitude }}</td>
                                            <td>{{ $item->jenis_rawan_bencana }}</td>
                                            <td>{{ $item->level_rawan_bencana }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Ubah</a>
                                                <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" colspan="7" class="text-center">Data Daerah Rawan Bencana
                                                Tidak Ada</th>
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
    <!-- Page body end -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Daerah Rawan Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('rawan_bencana.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_wilayah">Nama Wilayah</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control"
                                    placeholder="Masukkan nama wilayah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="koordinat_lattitude">Koordinat Lattitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_lattitude" id="koordinat_lattitude"
                                    class="form-control" placeholder="Masukkan koordinat lattitude">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="koordinat_longitude">Koordinat Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_longitude" id="koordinat_longitude"
                                    class="form-control" placeholder="Masukkan koordinat longitude">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="jenis_rawan_bencana">Jenis Rawan Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" name="jenis_rawan_bencana" id="jenis_rawan_bencana"
                                    class="form-control" placeholder="Masukkan jenis rawan bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="level_rawan_bencana">Level Rawan Bencana</label>
                            <div class="col-sm-10">
                                <select name="level_rawan_bencana" id="level_rawan_bencana" class="form-control">
                                    <option value="">Pilih Level Rawan Bencana</option>
                                    <option value="level 1">Level 1</option>
                                    <option value="level 2">Level 2</option>
                                    <option value="level 3">Level 3</option>
                                    <option value="level 4">Level 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
