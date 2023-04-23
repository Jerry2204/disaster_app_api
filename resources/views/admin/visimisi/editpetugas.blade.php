@extends('layouts.app')

@section('title', 'Ubah Pengurus')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Ubah Pengurus</h4>
                        <span>Form Ubah Pengurus</span>
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
                        <li class="breadcrumb-item"><a href="#!">Ubah Pengurus</a>
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
                    <div class="card-header">
                        <h5>Form Ubah Pengurus</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <form action="{{ route('pengurus.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('nama') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" id="nama"
                                        class="form-control {{ $errors->has('nama') ? 'form-control-danger' : '' }}"
                                        placeholder="Masukkan Nama" value="{{ $petugas->nama }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('jabatan') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
                                <div class="col-sm-10">
                                    {{-- <input type="text" name="jabatan" id="jabatan"
                                        class="form-control {{ $errors->has('jabatan') ? 'form-control-danger' : '' }}"
                                        placeholder="Masukkan jabatan" value="{{ $petugas->jabatan }}"> --}}
                                          <select name="jabatan_add" id="jabatan_add" class="form-control {{ $errors->has('jabatan_add') ? 'form-control-danger' : '' }}">
                                            <option value="">Pilih Jabatan</option>
                                            <option value="KEPALA UNSUR PELAKSANA">KEPALA UNSUR PELAKSANA</option>
                                            <option value="SEKRETARIS">SEKRETARIS</option>
                                            <option value="KASUBBAG PERENCANAAN">KASUBBAG PERENCANAAN</option>
                                            <option value="KASUBBAG UMUM DAN KEPEGAWAIAN">KASUBBAG UMUM DAN KEPEGAWAIAN</option>
                                            <option value="KABID PENCEGAHAN & KESIAPSIAGAAN">KABID PENCEGAHAN & KESIAPSIAGAAN</option>
                                            <option value="KABID KEDARURATAN & LOGISTIK">KABID KEDARURATAN & LOGISTIK</option>
                                            <option value="KABID REHABILITASI REKONSTRUKSI">KABID REHABILITASI REKONSTRUKSI</option>
                                            <option value="KASI KESIAPSIAGAAN ">KASI KESIAPSIAGAAN</option>
                                            <option value="KASI KEDARURATAN">KASI KEDARURATAN</option>
                                            <option value="KASI REHABILITASI">KASI REHABILITASI</option>

                                        </select>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('gambar') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="gambar">gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambar" id="gambar" accept="image/*"
                                        class="form-control {{ $errors->has('gambar') ? 'form-control-danger' : '' }}"
                                        placeholder="Masukkan gambar">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('nomor') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="nomor">Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nomor" id="nomor"
                                        class="form-control {{ $errors->has('nama') ? 'form-control-danger' : '' }}"
                                        placeholder="Masukkan Nomor" value="{{ $petugas->nomor }}">
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
@endsection


