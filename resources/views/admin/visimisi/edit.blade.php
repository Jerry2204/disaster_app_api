@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Ubah Visi & Misi</h4>
                        <span>Form Ubah Visi & Misi</span>
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
                        <li class="breadcrumb-item"><a href="#!">Ubah Visi & Misi</a>
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
                        <h5>Form Ubah Visi & Misi</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <form action="{{ route('visimisi.update', $visiMisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="visi">Visi</label>
                                <div class="col-sm-10">
                                    <textarea rows="10" cols="5" class="form-control" name="visi" id="visi" placeholder="Masukkan Visi">{{ $visiMisi->visi }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="misi">Misi</label>
                                <div class="col-sm-10">
                                    <textarea rows="10" cols="5" class="form-control" id="misi" name="misi" placeholder="Masukkan Misi">{{ $visiMisi->misi }}</textarea>
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
        .create(document.querySelector('#visi'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#misi'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
