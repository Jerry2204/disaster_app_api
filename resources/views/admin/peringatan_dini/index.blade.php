@extends('layouts.app')

@section('title', 'Peringatan Dini')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-warning bg-c-yellow"></i>

                    <div class="d-inline">
                        <h4>Peringatan Dini</h4>
                        <span>Daftar Peringatan Dini</span>
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
                        <li class="breadcrumb-item"><a href="#!">Peringatan Dini</a>
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
                            Tambah Peringatan Dini
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
                                        <th>Tanggal</th>
                                        <th>Lokasi</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peringatanDini as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning" id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-lokasi="{{ $item->lokasi }}" data-tanggal="{{ $item->tanggal }}" data-deskripsi="{{ $item->deskripsi }}" data-peringatan_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                {{-- <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('peringatan_dini.delete', $item->id) }}" method="POST"
                                                        id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Hapus
                                                </button> --}}
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
                            <div class="d-flex my-5">
                                {!! $peringatanDini->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peringatan Dini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('peringatan_dini.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" id="tanggal" class="form-control {{ $errors->has('tanggal') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama wilayah">
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('lokasi') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control {{ $errors->has('lokasi') ? 'form-control-danger' : '' }}" placeholder="Masukkan lokasi">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi" id="deskripsi"
                                    class="form-control {{ $errors->has('deskripsi') ? 'form-control-danger' : '' }}" placeholder="Masukkan deskripsi">
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Peringatan Dini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('peringatan_dini.update') }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="peringatan_id" id="peringatan_id" value="">
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" id="tanggal" class="form-control {{ $errors->has('tanggal') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama wilayah">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('lokasi') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control {{ $errors->has('lokasi') ? 'form-control-danger' : '' }}" placeholder="Masukkan lokasi">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi" id="deskripsi"
                                    class="form-control {{ $errors->has('deskripsi') ? 'form-control-danger' : '' }}" placeholder="Masukkan deskripsi">
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
        var tanggal = link.data("tanggal");
        var lokasi = link.data('lokasi');
        var deskripsi = link.data('deskripsi');
        var peringatan_id = link.data('peringatan_id');

        console.log(peringatan_id);

        var modal = $(this)
        modal.find('.modal-body #tanggal').val(tanggal);
        modal.find('.modal-body #lokasi').val(lokasi);
        modal.find('.modal-body #deskripsi').val(deskripsi);
        modal.find('.modal-body #peringatan_id').val(peringatan_id);
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
