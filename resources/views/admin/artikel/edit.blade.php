@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Ubah Berita</h4>
                        <span>Form Ubah Berita</span>
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
                        <li class="breadcrumb-item"><a href="#!">Ubah Berita</a>
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
                        <h5>Form Ubah Berita</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <form action="{{ route('artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('judul') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" id="judul"
                                        class="form-control {{ $errors->has('judul') ? 'form-control-danger' : '' }}"
                                        placeholder="Masukkan judul artikel" value="{{ $article->judul }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('deskripsi') ? 'has-danger' : '' }} row">
                                <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Masukkan deskripsi" id="deskripsi" cols="30" rows="10" name="deskripsi"
                                        class="form-control {{ $errors->has('deskripsi') ? 'form-control-danger' : '' }}">{{ $article->deskripsi }}</textarea>
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

@section('js')
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
