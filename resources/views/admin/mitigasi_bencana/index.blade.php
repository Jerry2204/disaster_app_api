@extends('layouts.app')

@section('title', 'Mitigasi Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-direction-alt bg-c-green"></i>
                     <div class="d-inline">
                        <h4>Mitigasi Bencana</h4>
                        <span>Daftar Mitigasi Bencana</span>
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
                        <li class="breadcrumb-item"><a href="#!">Mitigasi Bencana</a>
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
                            Tambah Mitigasi Bencana
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
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Konten</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mitigasiBencana as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->jenis_konten }}</td>
                                            <td>{{ $item->file }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning" id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-title="{{ $item->title }}" data-deskripsi="{{ $item->deskripsi }}" data-mitigasi_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('mitigasi_bencana.delete', $item->id) }}" method="POST"
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
                                            <th scope="row" colspan="7" class="text-center">Data Mitigasi Bencana
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $mitigasiBencana->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mitigasi Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mitigasi_bencana.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('title_add') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="title_add">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title_add" id="title_add" class="form-control {{ $errors->has('title_add') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan judul">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi_add') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="deskripsi_add">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi_add" id="deskripsi_add"
                                    class="form-control {{ $errors->has('deskripsi_add') ? 'form-control-danger' : '' }}" placeholder="Masukkan Deskripsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file">File</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" id="file" class="form-control" accept="video/*,.pdf">
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Mitigasi Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mitigasi_bencana.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="mitigasi_id" id="mitigasi_id" value="">
                        <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="title">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan judul">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi" id="deskripsi"
                                    class="form-control {{ $errors->has('deskripsi') ? 'form-control-danger' : '' }}" placeholder="Masukkan Deskripsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file">File</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" id="file" class="form-control" accept="video/*,.pdf">
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
        var title = link.data("title");
        var deskripsi = link.data('deskripsi');
        var mitigasi_id = link.data('mitigasi_id');

        var modal = $(this)
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #deskripsi').val(deskripsi);
        modal.find('.modal-body #mitigasi_id').val(mitigasi_id);
    })

    $(".delete").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus data ini?",
                text: "Anda tidak dapat memulihkan data nanti!",
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
