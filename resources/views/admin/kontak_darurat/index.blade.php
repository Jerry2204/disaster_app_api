@extends('layouts.app')

@section('title', 'Kontak Darurat')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-phone"style="background-color: #7C4DFF"></i>
                    <div class="d-inline">
                        <h4>Kontak Darurat</h4>
                        <span>Daftar Kontak Darurat</span>
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
                        <li class="breadcrumb-item"><a href="#!">Kontak Darurat</a>
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
                            Tambah Kontak Darurat
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
                                        <th>Nama</th>
                                        <th>Nomor</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kontakDarurat as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->nomor }}</td>
                                            <td>{{ $item->gambar }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-name="{{ $item->name }}"
                                                    data-nomor="{{ $item->nomor }}" data-kontak_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('kontak.delete', $item->id) }}" method="POST"
                                                        id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" colspan="7" class="text-center">Kontak Darurat
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $kontakDarurat->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kontak Darurat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('kontak.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('nomor') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nomor">Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor" id="nomor"
                                    class="form-control {{ $errors->has('nomor') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nomor">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kontak Darurat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('kontak.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="kontak_id" id="kontak_id" value="">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('nomor') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nomor">Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor" id="nomor"
                                    class="form-control {{ $errors->has('nomor') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nomor">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#modalEdit').on('show.bs.modal', function(e) {
            var link = $(e.relatedTarget)
            var name = link.data("name");
            var nomor = link.data('nomor');
            var kontak_id = link.data('kontak_id');

            var modal = $(this)
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #nomor').val(nomor);
            modal.find('.modal-body #kontak_id').val(kontak_id);
        })

        $(".delete").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus data ini?",
                text: "Anda tidak dapat memulihkan data nanti",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete${id}`).submit();
                }
            })
        })
    </script>
@endsection
