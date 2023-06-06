@extends('layouts.app')

@section('title', 'Kecamatan')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-location-pin bg-c-pink"></i>

                    <div class="d-inline">
                        <h4>Kecamatan</h4>
                        <span>Daftar Kecamatan Kabupaten Toba</span>
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
                        <li class="breadcrumb-item"><a href="#!">Kecamatan</a>
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
                            Tambah Kecamatan
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
                                        <th>Nama Kecamatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kecamatan as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_kecamatan }}</td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit"
                                                    data-nama_kecamatan="{{ $item->nama_kecamatan }}"
                                                    data-rawan_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('kecamatan.delete', $item->id) }}" method="POST"
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
                                            <th scope="row" colspan="7" class="text-center">Data Kecamatan
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $kecamatan->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('kecamatan.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('nama_kecamatan') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nama_kecamatan">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                    class="form-control {{ $errors->has('nama_kecamatan') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama kecamatan">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('kecamatan.update') }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="rawan_id" id="rawan_id" value="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_kecamatan">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control"
                                    placeholder="Masukkan nama Kecamatan">
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
            var nama_kecamatan = link.data("nama_kecamatan");

            var rawan_id = link.data('rawan_id');

            console.log(rawan_id);

            var modal = $(this)
            modal.find('.modal-body #nama_kecamatan').val(nama_kecamatan);
            modal.find('.modal-body #rawan_id').val(rawan_id);
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
